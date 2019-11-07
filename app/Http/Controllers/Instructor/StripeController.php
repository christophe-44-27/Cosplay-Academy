<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Requests\ProfessorProfileRequest;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Earning;
use App\Models\ProfessorProfile;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class StripeController extends Controller
{
    /**
     * TutorialController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function overview()
    {
        $lastTransactions = Invoice::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(6);

        $controller = 'wallet';

        return view('dashboard.wallet.index', compact('controller', 'lastTransactions'));
    }
}
