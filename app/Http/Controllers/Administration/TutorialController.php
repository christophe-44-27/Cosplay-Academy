<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller {

	public function index() {

		$tutorials = Tutorial::orderBy('id', 'DESC')->get();
		$activeSection = 'school';
		$action = 'tutorials';

		return view('administration.tutorials_list', compact('tutorials', 'activeSection', 'action'));
	}

	public function publish(Request $request, $id) {
		$tutorial = Tutorial::findOrFail($id);
		$tutorial->is_published = true;
		$tutorial->save();

		$request->session()->flash('success', 'Le tutoriel a été publié !');
		return redirect(route('admin_tutorial_list'));
	}

	public function unpublish(Request $request, $id) {
		$tutorial = Tutorial::findOrFail($id);
		$tutorial->is_published = false;
		$tutorial->save();

		$request->session()->flash('success', 'Le tutoriel a été dépublié !');
		return redirect(route('admin_tutorial_list'));
	}
}
