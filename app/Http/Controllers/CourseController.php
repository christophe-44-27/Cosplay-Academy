<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Providers\AppServiceProvider;
use App\Services\CourseService;
use App\Services\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $courses = Course::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(6);

        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.courses.index', compact('courses', 'categories'));
    }

    /**
     * @param string $filterValue
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function coursesByCategorie(string $filterValue) {
        $category = Category::where('filter_value', '=', $filterValue)
            ->firstOrFail();

        $categories = Category::all();

        $courses = Course::where('category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        $selectedCategory = $category->filter_value;

        return view('frontend.courses.index', compact('courses', 'category', 'categories', 'selectedCategory'));
    }

    public function show(Request $request, Course $course) {

        $course->nb_views = $course->nb_views + 1;
        $course->save();

        $currentUrl = $request->url();
        $userAlreadyParticipate = false;

        $relatedCourses = Course::where('category_id', '=', $course->category->id)
                ->where('is_published', '=', true)
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->get();

        if(Auth::user() && Auth::user()->courses)
        {
            $userAlreadyParticipate = Auth::user()->courses()->where('course_id', $course->id)->exists();
        }

        return view('frontend.courses.show', compact('course', 'currentUrl', 'relatedCourses',  'userAlreadyParticipate'));
    }

    /**
     * This method is used to report some course that are not in some good quality or
     * no allowed by the CGU.
     * @param CourseService $courseService
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reportTutorial(CourseService $courseService, Request $request, Course $course){

        $courseService->reportCourse($course);

        $request->session()->flash('success', Lang::get("Le cours a bien été signalé, un administrateur va vérifier le contenu du cours, merci de votre vigilance !"));
        return redirect(route('course_details', $course));
    }
}
