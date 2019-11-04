<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller {
    /**
     * ReviewController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $lastTransactions = Invoice::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(6);

        $controller = 'wallet';

        return view('dashboard.wallet.index', compact('lastTransactions', 'controller'));
    }
}
