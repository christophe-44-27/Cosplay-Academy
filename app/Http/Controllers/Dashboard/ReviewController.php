<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {
    /**
     * ReviewController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $reviews = Review::where('author_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->paginate(6);

        $controller = 'reviews';

        return view('dashboard.reviews.index', compact('reviews', 'controller'));
    }
}
