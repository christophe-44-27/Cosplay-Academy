<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class SubscriptionController extends Controller {

    public function index() {
        return view('subscriptions.index');
    }

    public function checkoutYearly(Request $request) {
        $user = Auth::user();

        if ($user->subscribed('cs_box')) {
            $request->session()->flash('success', "Vous êtes déjà abonné(e) ! :)");

            return redirect(route('my_subscriptions'));
        }

        if ($request->isMethod('POST')) {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeToken = $request->stripeToken;

            if ($user->stripe_id) {
                $user->newSubscription('cs_box', 'cs_box_yearly')->create();
            } else {
                $user->newSubscription('cs_box', 'cs_box_yearly')->create($stripeToken, [
                    'email' => $request->stripeEmail
                ]);
            }

            $request->session()->flash('success', "Votre souscription a bien été prise en compte, merci !");

            return redirect(route('my_subscriptions'));
        }
        return view('subscriptions.checkout_yearly');
    }

    public function checkoutMonthly(Request $request) {
        $user = Auth::user();
        if ($user->subscribed('cs_box')) {
            $request->session()->flash('success', "Vous êtes déjà abonné(e) ! :)");

            return redirect(route('my_subscriptions'));
        }

        if ($request->isMethod('POST')) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeToken = $request->stripeToken;
            if ($user->stripe_id) {
                $user->newSubscription('cs_box', 'cs_box_monthly')->create();
            } else {
                $user->newSubscription('cs_box', 'cs_box_monthly')->create($stripeToken, [
                    'email' => $request->stripeEmail
                ]);
            }
            $request->session()->flash('success', "Votre souscription a bien été prise en compte, merci !");
            return redirect(route('my_subscriptions'));
        }

        return view('subscriptions.checkout_monthly');
    }
}
