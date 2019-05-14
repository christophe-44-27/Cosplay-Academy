<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CreateCommissionRequest;
use App\Http\Requests\SendAnswerToCommissionQuotationRequest;
use App\Http\Requests\UpdateCommissionRequest;
use App\Mail\CommissionCreatedAdminMail;
use App\Mail\CommissionCreatedMail;
use App\Mail\CommissionQuotationAcceptedMail;
use App\Models\Commission;
use App\Http\Controllers\Controller;
use App\Models\CommissionQuotation;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CommissionController extends Controller {

    public function index() {
        $commissions = Commission::orderBy('id', 'DESC')
            ->paginate(15);
        $controller = 'offers';

        return view('commissions.dashboard.index', compact('commissions', 'controller'));
    }

    public function newRequest() {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $controller = 'offers';
        return view('commissions.dashboard.new_commission_request', compact('categories', 'controller'));
    }

    public function create(CreateCommissionRequest $request) {
        $validated = $request->validated();

        $resizedThumbnail = Image::make($request->file('cover_path'))->fit(750, 500)->encode('jpg');
        $hash = md5($resizedThumbnail->__toString());
        $path = "app/public/commissions/thumbnails/{$hash}.jpg";
        $publicPath = "commissions/thumbnails/{$hash}.jpg";
        if (!is_dir(storage_path("app/public/commissions/thumbnails"))) {
            Storage::makeDirectory("public/commissions/thumbnails");
        }
        $resizedThumbnail->save(storage_path($path));

        $arrayToCreate = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'max_budget' => $validated['max_budget'],
            'delivery_location' => $validated['delivery_location'],
            'desired_delivery_date' => $validated['desired_delivery_date'],
            'category_id' => $validated['category_id'],
            'cover_path' => $publicPath,
            'user_id' => Auth::id(),
            'slug' => str_slug($validated['title']),
        ];

        $commission = Commission::create($arrayToCreate);

        Mail::to($commission->user->email)->send(new CommissionCreatedMail($commission));
        Mail::to(getenv('MAIL_ADMIN'))->send(new CommissionCreatedAdminMail($commission));

        $request->session()->flash('success', "Votre offre a bien été enregistrée, merci de votre confiance !");
        return redirect(route('dashboard_commissions_offer'));
    }

    public function edit(Commission $offer) {
        $categories = Category::orderBy('name', 'ASC')->get();
        $controller = 'offers';

        return view('commissions.dashboard.edit_commission_request', compact('offer', 'categories', 'controller'));
    }

    public function update(UpdateCommissionRequest $request, Commission $offer) {
        $validated = $request->validated();

        if ($request->file('cover_path')) {
            $resizedThumbnail = Image::make($request->file('cover_path'))->fit(750, 500)->encode('jpg');
            $hash = md5($resizedThumbnail->__toString());
            $path = "app/public/commissions/thumbnails/{$hash}.jpg";
            $publicPath = "commissions/thumbnails/{$hash}.jpg";
            if (!is_dir(storage_path("app/public/commissions/thumbnails"))) {
                Storage::makeDirectory("public/commissions/thumbnails");
            }
            $resizedThumbnail->save(storage_path($path));

            $datas['cover_path']  = $publicPath;
        }

        $datas = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'max_budget' => $validated['max_budget'],
            'delivery_location' => $validated['delivery_location'],
            'desired_delivery_date' => $validated['desired_delivery_date'],
            'category_id' => $validated['category_id'],
            'slug' => str_slug($validated['title']),
        ];

        $offer->update($datas);

        $request->session()->flash('success', "Votre offre a bien été mise à jour !");
        return redirect(route('dashboard_commissions_offer'));
    }

    public function offerList() {
        $user = Auth::user();
        $controller = 'offers';

        $offers = Commission::where('user_id', '=', $user->id)
            ->orderBy('is_published', 'DESC')
            ->orderBy('id', 'DESC')
            ->get();

        return view('commissions.dashboard.offer_list', compact('offers','controller'));
    }

    public function show(int $id) {
        $commission = Commission::findOrFail($id);
        $controller = 'offers';

        return view('commissions.frontend.show', compact('commission', 'controller'));
    }

    public function displayQuotations(int $id) {
        $offer = Commission::where('id', '=', $id)->firstOrFail();
        $quotations = CommissionQuotation::where('commission_id', '=', $offer->id)->get();
        $controller = 'offers';

        return view('commissions.dashboard.offer_quotations', compact('offer', 'quotations', 'controller'));
    }

    public function accept(SendAnswerToCommissionQuotationRequest $request){
        $validated = $request->validated();
        $commissionQuotation = CommissionQuotation::where('id', '=', $validated['commission_quotation_id'])->firstOrFail();

        $isUpdated = CommissionQuotation::where('id', '=', $validated['commission_quotation_id'])
            ->update([
                'is_accepted' => true,
                'updated_at' => Carbon::now()
            ]);

        Mail::to($commissionQuotation->user->email)->send(new CommissionQuotationAcceptedMail($commissionQuotation, $validated['answer_quotation']));

        $request->session()->flash('success', "Vous venez d'accepter cette proposition, un courriel a été envoyé au cosplayeur concerné !");
        return redirect(route('commission_quotations', $commissionQuotation->commission->id));
    }
}
