<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommissionRequest;
use App\Mail\CommissionCreatedAdminMail;
use App\Mail\CommissionCreatedMail;
use App\Mail\ReportCommissionMail;
use App\Models\Commission;
use App\Models\CommissionQuotation;
use App\Models\TutorialCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CommissionController extends Controller {

    public function index(Request $request) {
        $commissions = Commission::where('in_review', '=', false)
            ->where('is_published', '=', true)
            ->orderBy('id', 'DESC')
            ->paginate(15);
        $categories = TutorialCategory::orderBy('name', 'ASC')->get();

        $currentUrl = $request->url();

        $lastCommissions = Commission::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return view('commissions.frontend.index', compact('categories', 'commissions', 'lastCommissions', 'currentUrl'));
    }

    public function newCommissionRequest(Request $request) {
        $currentUrl = $request->url();
        $categories = TutorialCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('commissions.frontend.information_request', compact('categories', 'currentUrl'));
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

    public function show(Request $request, string $slug) {
        $commission = Commission::where('slug', '=', $slug)
            ->where('is_published', '=', true)
            ->firstOrFail();
        $commission->nb_views = $commission->nb_views + 1;
        $commission->save();

        $currentUrl = $request->url();
        $user = Auth::user();
        $userHasAlreadySubmitted = 0;

        if (Auth::user()) {
            $userHasAlreadySubmitted = CommissionQuotation::where('commission_id', '=', $commission->id)
                ->where('user_id', '=', $user->id)
                ->count();
        }

        return view('commissions.frontend.show', compact('commission', 'currentUrl', 'userHasAlreadySubmitted'));
    }

    public function searchByCategory(Request $request, string $filterCategory) {
        $category = TutorialCategory::where('filter_value', '=', $filterCategory)->firstOrFail();
        $currentUrl = $request->url();

        $commissions = Commission::where('in_review', '=', false)
            ->where('category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        $lastCommissions = Commission::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $categories = TutorialCategory::orderBy('name', 'ASC')->get();

        return view('commissions.frontend.index', compact('categories', 'commissions', 'lastCommissions', 'currentUrl'));
    }

    public function report(Request $request, int $id) {
        if (!Auth::check()) {
            $request->session()->flash('error', 'Veuillez vous connecter pour signaler une commission.');
            return redirect(route('login'));
        }
        $commission = Commission::where('id', '=', $id)->firstOrFail();
        $commission->is_reported = true;
        $commission->save();

        Mail::to('contact@cosplayschool.ca')->send(new ReportCommissionMail($commission));

        $request->session()->flash('success', "La demande de commission a bien été signalée !");
        return redirect(route('commissions'));
    }
}
