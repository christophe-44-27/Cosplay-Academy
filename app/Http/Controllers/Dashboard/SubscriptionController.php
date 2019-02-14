<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $user = Auth::user();
        $onGracePeriod = false;
        $upcomingInvoice = null;
        $upcomingPrice = 0;
        $subscription = $user->subscription('premium_plan');

        if(!$subscription) {
            $request->session()->flash('error', "Vous n'avez pas d'abonnement actif.");
            return redirect(route('premium_index'));
        }

        if ($subscription && $user->subscription('premium_plan')->onGracePeriod()) {
            $onGracePeriod = true;
        }

        if ($user->upcomingInvoice()) {
            $upcomingInvoice = Carbon::createFromTimestamp($user->upcomingInvoice()->date);
            $upcomingPrice = $user->upcomingInvoice()->amount_remaining / 100;
        }

        $invoices = $user->invoices();
        $controller = 'subscriptions';
        $action = 'transactions';

        return view('dashboard/subscriptions/index', compact('upcomingInvoice', 'upcomingPrice', 'invoices',
            'controller', 'action', 'onGracePeriod', 'subscription'));
    }

    public function cancel(Request $request) {
        $user = Auth::user();
        $user->subscription('premium_plan')->cancel();

        $request->session()->flash('success', "Votre abonnement a bien été annulé. Vous pouvez le réactiver");

        return redirect(route('my_subscriptions'));
    }

    public function resume(Request $request) {
        $user = Auth::user();
        $user->subscription('premium_plan')->resume();

        $request->session()->flash('success', "Votre abonnement a bien été réactivé !");

        return redirect(route('my_subscriptions'));

    }
}
