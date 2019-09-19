<?php
namespace App\Services;

use App\Models\Document;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Storage;

class TutorialService {

    /**
     * @param int $limit
     * @return mixed
     */
    public function getTutorials(int $limit) {
        return Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }


    /**
     * @param array $documents
     * @param Tutorial $tutorial
     * @return bool
     */
    public function uploadDocuments(array $documents, Tutorial $tutorial): bool
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
            $document->documentable_type = 'App\Models\Tutorial';
            $document->path = 'documents/tutorials/' . $name;

            $document->save();
        }

        return true;
    }

}
