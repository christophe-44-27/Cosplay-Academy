<?php

namespace App\Http\Controllers\Tutorials;

use App\Models\TutorialCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorialCategoryController extends Controller {

	public function index() {
		$tutorialCategories = TutorialCategory::all();

		return view('', $tutorialCategories);
	}
}
