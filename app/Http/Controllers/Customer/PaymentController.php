<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $user = Auth::user();

        $payments = Payment::where('user_id', '=', $user->id)->paginate(15);

        $action = 'orders';

        return view('customer.payments.index', compact('payments', 'user', 'action'));
    }
}
