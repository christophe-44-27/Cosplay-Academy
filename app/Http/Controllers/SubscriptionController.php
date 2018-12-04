<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;

class SubscriptionController extends Controller {

    public function index() {
        return view('subscriptions.index');
    }

    public function checkoutYearly(Request $request) {
        $user = Auth::user();
        if ($request->isMethod('POST')) {

            $stripeToken = $request->input('stripeToken');

            $customer = Customer::create(array(
                'email' => $request->input('stripeEmail'),
                'source'  => $stripeToken
            ));

            $user->newSubscription('cs_box', 'cs_box_yearly')->create($customer->id);

            $request->session()->flash('success', "Votre souscription a bien été prise en compte, merci !");
            return redirect(route('my_subscriptions'));
        }
        return view('subscriptions.checkout_yearly');
    }

    public function checkoutMonthly() {
        return view('subscriptions.checkout_monthly');
    }
}
