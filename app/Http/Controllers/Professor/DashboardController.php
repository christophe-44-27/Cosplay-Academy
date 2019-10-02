<?php

namespace App\Http\Controllers\Professor;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
        $controller = 'dashboard';

        return view('professor.dashboard', compact('controller'));
    }
}
