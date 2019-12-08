<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {

	/**
	 * Display the page "about"
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about() {
		$members = User::all()->count();
		$courseCount = Course::where('is_published', '=', true)->count();
		$tutorialCount = Tutorial::where('is_published', '=', true)->count();

        $featuredUsers = User::where('featured', '=', true)->limit(3)->get();

        return view('pages.about', compact('featuredUsers', 'tutorialCount', 'courseCount', 'members'));
	}

	public function printingProgram() {
		return view('pages.printing_programm');
	}

	public function authorProgram() {
		return view('pages.author_program');
	}

	public function cgv() {
		return view('pages.cgv');
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
