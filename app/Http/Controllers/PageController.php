<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {

	/**
	 * Display the page "about"
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about() {
		$teacherCount = User::where('is_teacher', '=', true)->count();
		$studentCount = User::where('is_teacher', '=', false)->count();
		$tutorialCount = Tutorial::where('is_published', '=', true)->count();
		$tutorialNbViews = DB::table('tutorials')
			->where('is_published', '=', true)
			->sum('nb_views');

		return view('pages.about', compact(
			'studentCount',
			'teacherCount',
			'tutorialCount',
			'tutorialNbViews'
		));
	}
}
