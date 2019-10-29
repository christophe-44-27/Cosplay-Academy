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
        if (!empty($request->get('keywords')) && $request->get('category_id') === null)
        {
            $courses = $courseService->searchFromHomepage($request->get('keywords'));
            $keywords = $request->get('keywords');
        } elseif (!empty($request->get('keywords')) && $request->get('category_id') !== null)
        {
            $courses = $courseService->searchFromHomepage($request->get('keywords'), $request->get('category_id'));
            $keywords = $request->get('keywords');
        } elseif ($request->get('keywords') === null && $request->get('category_id') !== null)
        {
            $courses = Course::where('is_published', '=', true)
                ->where('category_id', '=', $request->get('category_id'))
                ->orderBy('id', 'DESC')->paginate(10);
        } else
        {
            $courses = Course::where('is_published', '=', true)
                ->orderBy('id', 'DESC')->paginate(10);
        }

        $categories = Category::orderBy('name', 'ASC')->get();

        if ($request->get('category_id'))
        {
            $givenCategory = Category::where('id', '=', $request->get('category_id'))->first();

            $selectedCategory = $givenCategory->filter_value;
        }


        return view('frontend.courses.index', compact('courses', 'categories', 'selectedCategory', 'keywords'));
    }
}
