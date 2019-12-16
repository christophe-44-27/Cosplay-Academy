<?php

namespace App\Http\Controllers;

use App\Http\Filters\Tutorials\TutorialFilter;
use App\Http\Filters\Courses\CourseFilter;
use App\Models\Category;
use App\Models\ContentPrice;
use App\Models\Course;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class GuestHomepageController extends Controller {

    public function index() {
        $tutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $featuredTutorials = Tutorial::where('is_published', '=', true)
            ->where('featured', '=', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $categories = Category::orderBy('name', 'ASC')
            ->where('featured', '=', true)
            ->get();

        $listCategories = Category::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('pages.homepage', compact(
            'tutorials',
            'categories', 'listCategories', 'featuredTutorials', 'contents'
        ));
    }

    /**
     * @param CourseFilter $courseFilter
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(CourseFilter $courseFilter, Request $request)
    {
        $courses = Course::filter($courseFilter)->where('is_published', '=', true)->paginate(10);
        $prices = ContentPrice::where('country_id', '1')->orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();

        $selectedDifficulties = $request->get('difficulties');
        $selectedPrices = $request->get('prices');
        $selectedCategories = $request->get('categories');

        return view('frontend.courses.index', compact('courses', 'categories', 'prices', 'selectedDifficulties', 'selectedPrices', 'selectedCategories'));
    }

    /**
     * @param TutorialFilter $tutorialFilter
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchTutorials(TutorialFilter $tutorialFilter, Request $request)
    {
        $tutorials = Tutorial::filter($tutorialFilter)->where('is_published', '=', true)->paginate(10);
        $prices = ContentPrice::where('country_id', '1')->orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();

        $selectedDifficulties = $request->get('difficulties');
        $selectedPrices = $request->get('prices');
        $selectedCategories = $request->get('categories');

        return view('frontend.tutorials.index', compact('tutorials', 'categories', 'prices','selectedCategories', 'selectedPrices', 'selectedDifficulties'));
    }
}
