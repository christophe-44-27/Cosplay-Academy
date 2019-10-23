<?php

namespace App\Http\Controllers\Customer;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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
    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses;
        $action = 'my_courses';

        return view('courses.course_liste', compact('courses', 'action'));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function participateToFreeCourse(Course $course)
    {
        $user = Auth::user();
        $user->courses()->attach([$course->id]);

        return redirect(route('course_details', $course))
            ->with('success', Lang::get("Félicitations, vous êtes inscrit(e) au cours " . $course->title . " ! Bon apprentissage !"));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function cancelParticipationCourse(Course $course)
    {
        $user = Auth::user();
        $user->courses()->detach($course->id);

        return redirect(route('course_details', $course))
            ->with('success', Lang::get("Vous vous êtes bien désinscrit(e) du cours " . $course->title . " ."));
    }
}
