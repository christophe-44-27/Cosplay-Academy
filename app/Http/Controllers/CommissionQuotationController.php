<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitQuotationRequest;
use App\Mail\CommissionQuotationHasBeenSubmittedMail;
use App\Models\Commission;
use App\Models\CommissionQuotation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CommissionQuotationController extends Controller {

    /**
     * @param SubmitQuotationRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitQuotation(SubmitQuotationRequest $request) {
        $validated = $request->validated();
        $commission = Commission::where('id', '=', $validated['commission_id'])->firstOrFail();


        $quotation = CommissionQuotation::create([
            'description' => $validated['description'],
            'price' => $validated['price'],
            'estimated_delivery_date' => $validated['estimated_delivery_date'],
            'commission_id' => $commission->id,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Mail::to($commission->user->email)->send(new CommissionQuotationHasBeenSubmittedMail($quotation));

        $request->session()->flash('success', "Votre soumission a bien été enregistrée !");
        return redirect(route('commission_sended'));
    }
}
