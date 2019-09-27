<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {

	/**
	 * Display the page "about"
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about() {
		$teacherCount = User::where('is_teacher', '=', true)->count();
		$studentCount = User::where('is_teacher', '=', false)->count();
		$tutorialCount = Course::where('is_published', '=', true)->count();
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

	public function printingProgram() {
		return view('pages.printing_programm');
	}

	public function authorProgram() {
		return view('pages.author_program');
	}

	public function cgu() {
		return view('pages.cgu');
	}

	public function policy() {
		return view('pages.policy');
	}

	public function contact() {
		return view('pages.contact');
	}
}
