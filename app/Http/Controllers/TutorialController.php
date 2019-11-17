<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tutorial;
use App\Services\Tutorials\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class TutorialController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $tutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.tutorials.index', compact('tutorials', 'categories'));
    }

    /**
     * @param string $filterValue
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tutorialByCategories(string $filterValue) {
        $category = Category::where('filter_value', '=', $filterValue)
            ->firstOrFail();

        $categories = Category::all();

        $tutorials = Tutorial::where('category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        $selectedCategory = $category->filter_value;

        return view('frontend.tutorials.index', compact('tutorials', 'category', 'categories', 'selectedCategory'));
    }

    /**
     * @param Request $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Tutorial $tutorial) {

        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        $currentUrl = $request->url();

        $relatedTutorials = Tutorial::where('category_id', '=', $tutorial->category->id)
                ->where('is_published', '=', true)
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->get();

        return view('frontend.tutorials.show', compact('course', 'currentUrl', 'relatedTutorials'));
    }

    /**
     * This method is used to report some course that are not in some good quality or
     * no allowed by the CGU.
     * @param TutorialService $tutorialService
     * @param Request $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reportTutorial(TutorialService $tutorialService, Request $request, Tutorial $tutorial){

        $tutorialService->reportTutorial($tutorial);

        $request->session()->flash('success', Lang::get("Le tutoriel a bien été signalé, un administrateur va vérifier son contenu, merci de votre vigilance !"));
        return redirect(route('tutorial_details', $tutorial));
    }
}
