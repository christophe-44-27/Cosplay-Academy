<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;

class IndexController extends Controller {

	public function index() {

		$activeSection = 'homepage';
		$action = 'homepage';

		return view('administration.index', compact('activeSection', 'action'));
	}
}
