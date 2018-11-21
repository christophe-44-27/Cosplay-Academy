<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use App\Models\TutorialCategory;

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

        return view('tutorials.frontend.index', $tutorials);
    }
}
