<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller {

	public function index() {
		$teacherCount = User::where('is_teacher', '=', true)->count();
		$studentCount = User::where('is_teacher', '=', false)->count();
		$tutorialCount = Tutorial::where('is_published', '=', true)->count();
		$tutorialNbViews = DB::table('tutorials')
			->where('is_published', '=', true)
			->sum('nb_views');

		$teachers = User::where('is_teacher', '=', true)->get();

		return view('teachers.frontend.index', compact(
			'studentCount',
			'teacherCount',
			'tutorialCount',
			'tutorialNbViews',
			'teachers'
		));
	}

	public function show(int $id) {
		$teacher = User::findOrFail($id);
		return view('teachers.frontend.show', compact('teacher'));
	}
}
