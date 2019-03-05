<?php

namespace App\Http\Controllers\Administration;

use App\Forum\Models\Thread;
use App\Http\Controllers\Controller;

class ThreadController extends Controller {

	public function index() {

		$threads = Thread::orderBy('id', 'DESC')->get();
		$activeSection = 'threads';
		$action = 'list';

		return view('administration.threads_list', compact('threads', 'activeSection', 'action'));
	}
}
