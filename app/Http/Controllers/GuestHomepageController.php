<?php

namespace App\Http\Controllers;

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

        $categories = Category::orderBy('name', 'ASC')
            ->where('featured', '=', true)
            ->get();

        $listCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('pages.homepage', compact(
            'courses',
            'categories', 'listCategories'
        ));
    }

    /**
     * @param Request $request
     * @param CourseService $courseService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request, CourseService $courseService)
    {
        if (!empty($request->get('keywords')))
        {
            $courses = $courseService->searchFromHomepage($request->get('keywords'), $request->get('category_id'));
        } else
        {
            $courses = Course::where('is_published', '=', true)
                ->where('category_id', '=', $request->get('category_id'))
                ->orderBy('id', 'DESC')->paginate(15);
        }

        $categories = Category::orderBy('name', 'ASC')->get();

        $givenCategory = Category::where('id', '=', $request->get('category_id'))->first();

        $selectedCategory = $givenCategory->filter_value;

        return view('frontend.courses.index', compact('courses', 'categories', 'selectedCategory'));
    }
}
