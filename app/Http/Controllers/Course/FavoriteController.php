<?php

namespace App\Http\Controllers\Course;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class FavoriteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCourseFavorites()
    {
        $user = Auth::user();

        $favorites = new Collection();

        if ($user->courseFavorites->count() > 0) {
            $favorites = $user->courseFavorites;
        }

        $action = 'course_favorites';

        return view('courses.connected_user_favorites', compact('favorites', 'user', 'action'));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToFavorite(Course $course) {
        $user = Auth::user();

        $user->courseFavorites()->attach([$course->id]);


        return redirect(route('course_favorite'))
            ->with('success', Lang::get("Le cours a bien été ajouté à vos favoris"));
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeFromFavorites(Course $course) {
        $user = Auth::user();

        $user->courseFavorites()->detach($course->id);


        return redirect(route('course_favorite'))
            ->with('success', Lang::get("Le cours a bien été supprimé de vos favoris"));
    }
}
