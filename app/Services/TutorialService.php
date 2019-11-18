<?php
namespace App\Services;

use App\Models\Document;
use App\Models\Course;
use App\Models\Tutorial;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class TutorialService {

    /**
     * @param int $limit
     * @return mixed
     */
    public function getTutorials(int $limit) {
        return Course::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }


    /**
     * @param array $documents
     * @param Course $tutorial
     * @return bool
     */
    public function uploadDocuments(array $documents, Course $tutorial): bool
    {
        foreach ($documents as $file) {
            $name = $file->getClientOriginalName();

            if (!is_dir(storage_path("app/public/documents/tutorials"))) {
                Storage::makeDirectory("public/documents/tutorials");
            }

            $file->move(storage_path('app/public/documents') . '/tutorials/', $name);

            $document = new Document();
            $document->filename = $name;
            $document->type = $file->getClientOriginalExtension();
            $document->documentable_id = $tutorial->id;
            $document->documentable_type = 'App\Models\Course';
            $document->path = 'documents/tutorials/' . $name;

            $document->save();
        }

        return true;
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
            return Lang::get("Ce tutoriel a bien été retiré de vos favoris.");
        } else {
            return Lang::get("Ce tutoriel ne fait pas partie de vos favoris.");
        }
    }

    /**
     * @param Tutorial $tutorial
     * @return void
     */
    public function incrementeViewCounter(Tutorial $tutorial)
    {
        $tutorial->tutorialViews()->sync([Auth::id()]);
    }

}
