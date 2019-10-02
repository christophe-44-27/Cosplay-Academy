<?php

namespace App\Http\Controllers\Professor;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * CourseController constructor.
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
        $courses = Course::where('user_id', '=', Auth::user()->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'tutorials';
        return view('dashboard.tutorials.index', compact('tutorials', 'controller'));
    }

    public function favoritesCourse()
    {

    }
}
