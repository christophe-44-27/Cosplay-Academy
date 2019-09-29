<?php

namespace App\Http\Controllers\Customer;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $tutorials = Course::where('user_id', '=', Auth::user()->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(6);
        $controller = 'tutorials';
        return view('dashboard.tutorials.index', compact('tutorials', 'controller'));
    }
}
