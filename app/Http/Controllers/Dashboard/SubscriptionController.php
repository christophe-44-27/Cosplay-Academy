<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $user = Auth::user();
        $upcomingInvoice = Carbon::createFromTimestamp($user->upcomingInvoice()->date);
        $upcomingPrice = $user->upcomingInvoice()->amount_remaining / 100;
        $invoices = $user->invoices();

        return view('dashboard/subscriptions/index', compact('upcomingInvoice', 'upcomingPrice', 'invoices'));
    }
}
