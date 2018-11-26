<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestHomepageController extends Controller {

	public function index() {
		$tutorials = Tutorial::where('is_published', '=', 1)->get();
		$teachers = User::where('is_teacher', '=', true)
						->where('profile_picture', '!=', null)
						->where('cover_picture', '!=', null)
						->get();

		$teacherCount = User::where('is_teacher', '=', true)->count();
		$studentCount = User::where('is_teacher', '=', false)->count();
		$tutorialCount = Tutorial::where('is_published', '=', true)->count();
		$tutorialNbViews = DB::table('tutorials')
			->where('is_published', '=', true)
			->sum('nb_views');

		return view('homepage', compact(
			'tutorials',
			'teachers',
			'tutorialNbViews',
			'studentCount',
			'teacherCount',
			'tutorialCount'
		));
	}
}
