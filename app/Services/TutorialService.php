<?php
namespace App\Services;

use App\Models\Tutorial;

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

}
