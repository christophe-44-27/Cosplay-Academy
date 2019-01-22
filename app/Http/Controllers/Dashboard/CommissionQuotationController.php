<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CommissionQuotation;
use Illuminate\Support\Facades\Auth;

class CommissionQuotationController extends Controller {

    public function index() {
        $quotations = CommissionQuotation::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(15);

        $controller = 'quotations';

        return view('commissions.dashboard.index', compact('quotations', 'controller'));
    }
}
