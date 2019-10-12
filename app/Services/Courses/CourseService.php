<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Lang;

class CourseService {

    /**
     * @param Course $course
     * @return void
     */
    public function incrementeViewCounter(Course $course)
    {
        $course->nb_views = $course->nb_views + 1;
        $course->save();
    }

    /**
     * @param Course $course
     * @return void
     */
    public function reportCourse(Course $course)
    {
        if($course->is_reported == false)
        {
            $course->is_reported = true;
            $course->save();
        }
    }

    /**
     * @param User $user
     * @param Course $course
     * @return array|null|string
     */
    public function addCourseToFavorite(User $user, Course $course)
    {
        if(!$user->courseFavorites->contains($course->id))
        {
            $user->courseFavorites()->attach([$course->id]);
            return Lang::get("Ce cours a bien été ajouté à vos favoris.");
        } else {
            return Lang::get("Ce cours fait déjà partie de vos favoris.");
        }
    }

    /**
     * @param User $user
     * @param Course $course
     * @return array|null|string
     */
    public function removeCourseToFavorite(User $user, Course $course)
    {
        if($user->courseFavorites->contains($course->id))
        {
            $user->courseFavorites()->detach([$course->id]);
            return Lang::get("Ce cours a bien été retiré à vos favoris.");
        } else {
            return Lang::get("Ce cours ne fait pas partie de vos favoris.");
        }
    }
}
