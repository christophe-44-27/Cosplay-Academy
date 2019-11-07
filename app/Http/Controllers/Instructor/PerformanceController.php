<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
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
    public function index()
    {
        $controller = 'earnings';

        $earnings = Earning::where('seller_id', '=', Auth::user()->id)->paginate(10);

        return view('instructor.earnings.index', compact('controller', 'earnings'));
    }
}
