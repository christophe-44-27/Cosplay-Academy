<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Lang;

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
            ->get();

        $controller = 'reviews';
        $title = Lang::get("Mes avis");
        $alert = Lang::get("Vous n'avez pas encore donné d'avis");

        return view('dashboard.reviews.index', compact('reviews', 'controller', 'receivedReviews', 'title', 'alert'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function receivedReviews()
    {
        $reviews = Review::whereHasMorph(
            'reviewable',
            [Course::class , Tutorial::class],
            function (Builder $query) {
                $query->where('user_id', '=', Auth::user()->id);
            }
        )->paginate(10);

        $controller = 'reviews';
        $title = Lang::get("Mes avis reçus");
        $alert = Lang::get("Vous n'avez pas encore reçu d'avis");

        return view('dashboard.reviews.index', compact('reviews', 'controller', 'title', 'alert'));

    }
}
