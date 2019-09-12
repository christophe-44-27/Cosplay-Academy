<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\User;
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

        $memberCount = User::count();
        $users = User::orderBy('id', 'DESC')->limit(8)->get();
        $tutorialCount = Tutorial::where('is_published', '=', true)->count();
        $tutorialNbViews = Tutorial::where('is_published', '=', true)->sum('nb_views');

        return view('pages.homepage', compact(
            'promotedTutorials',
            'famousTutorials',
            'users',
            'tutorialNbViews',
            'memberCount',
            'tutorialCount'
        ));
    }
}
