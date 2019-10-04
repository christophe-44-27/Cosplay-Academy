<?php

namespace App\Http\Controllers\Course;

use App\Http\Requests\ReviewRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ReviewController extends Controller
{
    /**
     * @param ReviewRequest $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ReviewRequest $request, Course $course)
    {
        $validated = $request->validated();

        $review = new Review();
        $review->content = $validated['content'];
        $review->author_id = Auth::user()->id;
        $review->reviewable_id = $course->id;
        $review->reviewable_type = 'App\Models\Course';
        $review->nb_stars = $validated['nb_stars'];

        $review->save();

        return redirect(route('course_details', $course))->with('success', Lang::get("Votre commentaire a bien été ajouté !"));
    }

    /**
     * @param Review $review
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function remove(Review $review, Course $course)
    {
        $review->delete();

        return redirect(route('course_details', $course))->with('success', Lang::get("Votre commentaire a bien été supprimé !"));
    }

    /**
     * @param ReviewRequest $request
     * @param Review $review
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ReviewRequest $request, Review $review, Course $course)
    {
        $review->update($request->all());

        return redirect(route('course_details', $course))->with('success', Lang::get("Votre commentaire a bien été modifié !"));
    }
}
