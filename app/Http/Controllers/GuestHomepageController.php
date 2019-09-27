<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GuestHomepageController extends Controller {

    public function index() {
        $courses = Course::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();

        $categories = Category::orderBy('name', 'ASC')
            ->where('featured', '=', true)
            ->get();

        return view('pages.homepage', compact(
            'courses',
            'categories'
        ));
    }
}
