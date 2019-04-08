<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\User;
use Illuminate\Support\Facades\DB;

class GuestHomepageController extends Controller {

    public function index() {
        $promotedTutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $famousTutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('nb_views', 'desc')
            ->limit(8)
            ->get();

        $teachers = User::where('is_teacher', '=', true)
            ->where('profile_picture', '!=', null)
            ->where('cover_picture', '!=', null)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $teacherCount = User::where('is_teacher', '=', true)->count();
        $members = User::count();
        $tutorialCount = Tutorial::where('is_published', '=', true)->count();
        $tutorialNbViews = Tutorial::where('is_published', '=', true)->sum('nb_views');

        return view('homepage', compact(
            'promotedTutorials',
            'famousTutorials',
            'teachers',
            'tutorialNbViews',
            'members',
            'teacherCount',
            'tutorialCount'
        ));
    }
}
