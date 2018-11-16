<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;

class GuestHomepageController extends Controller {

	public function index() {
		$tutorials = Tutorial::where('current_state', '=', 'published');
		$teachers = User::where('is_teacher', '=', true)->get();

		return view('homepage', compact('tutorials', 'teachers'));
	}
}
