<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class SubscriptionController extends Controller {

    public function index() {
        $user = Auth::user();

        $teacherCount = User::where('is_teacher', '=', true)->count();
        $studentCount = User::where('is_teacher', '=', false)->count();
        $tutorialCount = Tutorial::where('is_published', '=', true)->count();
        $tutorialNbViews = DB::table('tutorials')
            ->where('is_published', '=', true)
            ->sum('nb_views');

        return view('subscriptions.premium', compact('user', 'teacherCount', 'studentCount', 'tutorialCount'
        ,'tutorialNbViews'));
    }

    public function checkoutYearly(Request $request) {
        $user = Auth::user();

        if ($user->subscribed('premium_plan')) {
            $request->session()->flash('success', "Vous êtes déjà abonné(e) ! :)");

            return redirect(route('my_subscriptions'));
        }

        if ($request->isMethod('POST')) {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeToken = $request->stripeToken;

            if ($user->stripe_id) {
                $user->newSubscription('premium_plan', 'premium_yearly')->create();
            } else {
                $user->newSubscription('premium_plan', 'premium_yearly')->create($stripeToken, [
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
        if ($user->subscribed('premium_plan')) {
            $request->session()->flash('success', "Vous êtes déjà abonné(e) ! :)");

            return redirect(route('my_subscriptions'));
        }

        if ($request->isMethod('POST')) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripeToken = $request->stripeToken;
            if ($user->stripe_id) {
                $user->newSubscription('premium_plan', 'premium_monthly')->create();
            } else {
                $user->newSubscription('premium_plan', 'premium_monthly')->create($stripeToken, [
                    'email' => $request->stripeEmail
                ]);
            }
            $request->session()->flash('success', "Votre souscription a bien été prise en compte, merci !");
            return redirect(route('my_subscriptions'));
        }

        return view('subscriptions.checkout_monthly');
    }
}
