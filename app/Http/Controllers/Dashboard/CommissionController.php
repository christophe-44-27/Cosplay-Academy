<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\SendAnswerToCommissionQuotationRequest;
use App\Mail\CommissionQuotationAcceptedMail;
use App\Models\Commission;
use App\Http\Controllers\Controller;
use App\Models\CommissionQuotation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CommissionController extends Controller {

    public function index() {
        $commissions = Commission::where('in_review', '=', false)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        return view('commissions.dashboard.index', compact('commissions'));
    }

    public function newRequest() {
        return view('commissions.dashboard.new_commission_request');
    }

    public function offerList() {
        $user = Auth::user();

        $offers = Commission::where('user_id', '=', $user->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('commissions.dashboard.offer_list', compact('offers'));
    }

    public function show(int $id) {
        $commission = Commission::findOrFail($id);

        return view('commissions.frontend.show', compact('commission'));
    }

    public function displayQuotations(int $id) {
        $offer = Commission::where('id', '=', $id)->firstOrFail();
        $quotations = CommissionQuotation::where('commission_id', '=', $offer->id)->get();

        return view('commissions.dashboard.offer_quotations', compact('offer', 'quotations'));
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
