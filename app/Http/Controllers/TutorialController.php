<?php

namespace App\Http\Controllers;

use App\Http\Resources\TutorialCollection;
use App\Models\Category;
use App\Models\ContentPrice;
use App\Models\Tutorial;
use App\Services\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class TutorialController extends Controller {

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $tutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $prices = ContentPrice::where('country_id', '1')->orderBy('id', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();

        return view('frontend.tutorials.index', compact('tutorials', 'categories', 'prices'));
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

        $tutorials = TutorialCollection::collection($tutorials);
        $prices = ContentPrice::where('country_id', '1')->orderBy('id', 'ASC')->get();

        $selectedCategory = $category->filter_value;

        return view('frontend.tutorials.index', compact('tutorials', 'category', 'categories', 'selectedCategory', 'prices'));
    }

    /**
     * @param Request $request
     * @param TutorialService $tutorialService
     * @param Tutorial $tutorial
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, TutorialService $tutorialService, Tutorial $tutorial) {

        $currentUrl = $request->url();
        $userAlreadyFavorite = false;

        if(Auth::user() && Auth::user()->tutorials)
        {
            $tutorialService->incrementeViewCounter($tutorial);
            $userAlreadyFavorite = Auth::user()->tutorialFavorites()->where('tutorial_id', $tutorial->id)->exists();
        }

        $relatedTutorials = Tutorial::where('category_id', '=', $tutorial->category->id)
                ->where('is_published', '=', true)
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->get();

        return view('frontend.tutorials.show', compact('tutorial', 'currentUrl', 'relatedTutorials', 'userAlreadyFavorite'));
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
