<?php

namespace App\Http\Controllers;

use App\Http\Filters\Courses\CourseFilter;
use App\Models\Category;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class GuestHomepageController extends Controller {

    public function index() {
        $courses = Course::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $featuredCourses = Course::where('is_published', '=', true)
            ->where('featured', '=', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $categories = Category::orderBy('name', 'ASC')
            ->where('featured', '=', true)
            ->get();

        $listCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('pages.homepage', compact(
            'courses',
            'categories', 'listCategories', 'featuredCourses'
        ));
    }

    /**
     * @param Request $request
     * @param CourseService $courseService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(CourseFilter $courseFilter)
    {
        $courses = Course::filter($courseFilter)->where('is_published', '=', true)->paginate(10);

        $categories = Category::orderBy('name', 'ASC')
            ->where('featured', '=', true)
            ->get();
        return view('frontend.courses.index', compact('courses', 'categories'));
    }
}
