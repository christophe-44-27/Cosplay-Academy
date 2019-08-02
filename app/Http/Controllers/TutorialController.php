<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\Category;
use App\Services\TutorialService;
use Illuminate\Http\Request;

class TutorialController extends Controller {

    public function index(TutorialService $tutorialService) {
        $tutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->paginate(15);

        $lastTutorials = $tutorialService->getTutorials(3);

        $categories = Category::all();

        return view('tutorials.frontend.index', compact('tutorials', 'categories', 'lastTutorials'));
    }

    public function tutorialByCategorie(string $filterValue, TutorialService $tutorialService) {
        $category = Category::where('filter_value', '=', $filterValue)
            ->firstOrFail();

        $categories = Category::all();

        $tutorials = Tutorial::where('category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        $lastTutorials = $tutorialService->getTutorials(3);

        return view('tutorials.frontend.index', compact('tutorials', 'category', 'categories', 'lastTutorials'));
    }

    public function show(Request $request, string $slug) {

        $tutorial = Tutorial::where('slug', '=', $slug)
            ->where('is_published', '=', true)
            ->firstOrFail();

        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        $currentUrl = $request->url();

        $relatedTutorials = Tutorial::where('category_id', '=', $tutorial->category->id)
                                ->where('is_published', '=', true)
                                ->orderBy('id', 'DESC')
                                ->limit(4)
                                ->get();

        return view('tutorials.frontend.show', compact('tutorial', 'currentUrl', 'relatedTutorials'));
    }

    /**
     * This method is used to report some tutorial that are not in some good quality or
     * no allowed by the CGU.
     * @param Request $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reportTutorial(Request $request, Tutorial $tutorial){
        $tutorial->is_reported = true;
        $tutorial->save();

        $tutorial->report($tutorial);

        $request->session()->flash('success', 'Le tutoriel a bien été signalé !');
        return redirect(route('tutorials'));
    }
}
