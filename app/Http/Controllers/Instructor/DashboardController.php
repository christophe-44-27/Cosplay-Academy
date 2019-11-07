<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\Feed;
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

        $userFeeds = Feed::where('user_id', '=', $user->id)->limit(6)->orderBy('id', 'DESC')->get();

        return view('instructor.dashboard', compact('controller', 'nbCours', 'nbTutorials', 'userFeeds'));
    }
}
