<?php

namespace App\Http\Controllers\Course;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\CourseService;
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
     * @param CourseService $courseService
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToFavorite(CourseService $courseService, Course $course) {
        $user = Auth::user();

        $status = $courseService->addCourseToFavorite($user, $course);

        return redirect(route('course_favorite'))
            ->with('success', Lang::get($status));
    }

    /**
     * @param CourseService $courseService
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeFromFavorites(CourseService $courseService, Course $course) {
        $user = Auth::user();

        $status = $courseService->removeCourseToFavorite($user, $course);

        return redirect(route('course_favorite'))
            ->with('success', Lang::get($status));
    }
}
