<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentPrice;
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

        $prices = ContentPrice::where('country_id', '1')->orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.courses.index', compact('courses', 'categories', 'prices'));
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
        $prices = ContentPrice::where('country_id', '1')->orderBy('id', 'ASC')->get();

        return view('frontend.courses.index', compact('courses', 'category', 'categories', 'selectedCategory', 'prices'));
    }

    /**
     * @param Request $request
     * @param Course $course
     * @param CourseService $courseService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Course $course, CourseService $courseService)
    {
        $currentUrl = $request->url();
        $userAlreadyParticipate = false;
        $userAlreadyFavorite = false;

        $relatedCourses = Course::where('category_id', '=', $course->category->id)
                ->where('is_published', '=', true)
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->get();

        $featuredCourses = Course::where('featured', '=', true)->limit(5)->get();

        if(Auth::user() && Auth::user()->courses)
        {
            $courseService->incrementeViewCounter($course);
            $userAlreadyParticipate = Auth::user()->courseParticipations()->where('course_id', $course->id)->exists();
            $userAlreadyFavorite = Auth::user()->courseFavorites()->where('course_id', $course->id)->exists();
            $receiver = $course->user;
        }

        return view('frontend.courses.show', compact('course', 'receiver', 'currentUrl', 'relatedCourses',
            'userAlreadyParticipate', 'featuredCourses', 'userAlreadyFavorite'));
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
