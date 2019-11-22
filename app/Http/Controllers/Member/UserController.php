<?php

namespace App\Http\Controllers\Member;

use App\Models\Course;
use App\Models\Review;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function show(Request $request, User $user) {
        $courses = Course::where('user_id', '=', $user->id)
            ->orderBy('id', 'DESC')
            ->get();

        $tutorials = Tutorial::where('user_id', '=', $user->id)
            ->orderBy('id', 'DESC')
            ->get();

        $currentUrl = $request->url();

        $authorCoursesReviews = Review::where('author_id', '=', $user->id)->get();
        $totalReviews = 0;

        if($authorCoursesReviews->count() > 0)
        {
            foreach ($authorCoursesReviews as $review)
            {
                $totalReviews = $totalReviews +$review->nb_stars;
            }

            $avgReviews = $totalReviews / $authorCoursesReviews->count();
        }

        return view('frontend.users.show', compact('user', 'courses', 'tutorials', 'currentUrl', 'avgReviews', 'authorCoursesReviews'));
    }
}
