<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class CourseService {

    /**
     * @param Course $course
     * @return void
     */
    public function incrementeViewCounter(Course $course)
    {
        $course->userViews()->sync([Auth::id()]);
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
            return Lang::get("Ce cours a bien été retiré de vos favoris.");
        } else {
            return Lang::get("Ce cours ne fait pas partie de vos favoris.");
        }
    }

    /**
     * @param $keywords
     * @param int $categoryId
     * @return mixed
     */
    public function searchFromHomepage($keywords, int $categoryId = null)
    {
        $results = Course::select([
            'id',
            'title',
            'category_id',
            'user_id',
            'introduction',
            'thumbnail_picture',
            'created_at',
            'updated_at',
            'type_id',
            'difficulty',
            'price',
            'slug',
            'language_id'
        ])
        ->where('is_published', '=', true)
        ->whereRaw("MATCH(title, introduction) AGAINST('" . $keywords . "*' IN BOOLEAN MODE)");

        if(!is_null($categoryId))
        {
            $results->where('category_id', '=', $categoryId);
        }

        return $results->paginate(15);
    }

    /**
     * @param array $courseIds
     * @param User $user
     */
    public function addCourseInscription(array $courseIds, User $user)
    {
        $user->courseParticipations()->attach($courseIds);
    }
}
