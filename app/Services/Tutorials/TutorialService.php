<?php

namespace App\Services\Tutorials;

use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Support\Facades\Lang;

class TutorialService {

    /**
     * @param Tutorial $tutorial
     * @return void
     */
    public function incrementeViewCounter(Tutorial $tutorial)
    {
        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();
    }

    /**
     * @param Tutorial $tutorial
     * @return void
     */
    public function reportTutorial(Tutorial $tutorial)
    {
        if($tutorial->is_reported == false)
        {
            $tutorial->is_reported = true;
            $tutorial->save();
        }
    }

    /**
     * @param User $user
     * @param Tutorial $tutorial
     * @return array|null|string
     */
    public function addTutorialToFavorite(User $user, Tutorial $tutorial)
    {
        if(!$user->tutorialFavorites->contains($tutorial->id))
        {
            $user->tutorialFavorites()->attach([$tutorial->id]);
            return Lang::get("Ce tutoriel a bien été ajouté à vos favoris.");
        } else {
            return Lang::get("Ce tutoriel fait déjà partie de vos favoris.");
        }
    }

    /**
     * @param User $user
     * @param Tutorial $tutorial
     * @return array|null|string
     */
    public function removeTutorialToFavorite(User $user, Tutorial $tutorial)
    {
        if($user->tutorialFavorites->contains($tutorial->id))
        {
            $user->tutorialFavorites()->detach([$tutorial->id]);
            return Lang::get("Ce tutoriel a bien été retiré à vos favoris.");
        } else {
            return Lang::get("Ce tutoriel ne fait pas partie de vos favoris.");
        }
    }

    /**
     * @param $keywords
     * @param int $categoryId
     * @return mixed
     */
    public function searchFromHomepage($keywords, int $categoryId)
    {
        $results = Tutorial::select([
            'id',
            'title',
            'category_id',
            'user_id',
            'content',
            'thumbnail_picture',
            'nb_views',
            'nb_likes',
            'created_at',
            'updated_at',
            'slug',
            'language_id'
        ])
        ->where('is_published', '=', true)
        ->whereRaw("MATCH(title) AGAINST('" . $keywords . "*' IN BOOLEAN MODE)");

        if(!empty($categoryId))
        {
            $results->where('category_id', '=', $categoryId);
        }

        return $results->paginate(15);
    }
}
