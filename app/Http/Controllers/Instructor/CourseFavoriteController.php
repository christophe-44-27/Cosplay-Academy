<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class CourseFavoriteController extends Controller {
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
        $courses = Auth::user()->courseFavorites()->paginate(10);

        $controller = 'favorites';

        return view('instructor.courses.course_favorites', compact('courses', 'controller'));
    }


    /**
     * @param CourseService $courseService
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeFromFavorites(CourseService $courseService, Course $course) {
        $user = Auth::user();

        $status = $courseService->removeCourseToFavorite($user, $course);

        return redirect(route('professor_course_favorites'))
            ->with('success', Lang::get($status));
    }
}
