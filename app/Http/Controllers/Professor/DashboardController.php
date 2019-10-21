<?php

namespace App\Http\Controllers\Professor;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\Tutorial;
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
        $user = Auth::user();

        $nbCours = Course::where('user_id', '=', $user->id)->count();
        $nbTutorials = Tutorial::where('user_id', '=', $user->id)->count();

        return view('professor.dashboard', compact('controller', 'nbCours', 'nbTutorials'));
    }
}
