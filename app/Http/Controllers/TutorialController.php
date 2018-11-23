<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use App\Models\TutorialCategory;
use Illuminate\Http\Request;

class TutorialController extends Controller {

    public function index() {
        $tutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $lastTutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $categories = TutorialCategory::all();

        return view('tutorials.frontend.index', compact('tutorials', 'categories', 'lastTutorials'));
    }

    public function tutorialByCategorie(string $filterValue) {
        $category = TutorialCategory::where('filter_value', '=', $filterValue)
            ->get();

        $tutorials = Tutorial::where('tutorial_category_id', '=', $category)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->get();

        return view('tutorials.frontend.index', compact('tutorials', 'category'));
    }

    public function show(Request $request, string $slug) {

        $tutorial = Tutorial::where('slug', '=', $slug)->first();
        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        $currentUrl = $request->url();

        $relatedTutorials = Tutorial::where('tutorial_category_id', '=', $tutorial->tutorialCategory->id)
                                ->orderBy('id', 'DESC')
                                ->limit(4)
                                ->get();

        return view('tutorials.frontend.show', compact('tutorial', 'currentUrl', 'relatedTutorials'));
    }
}
