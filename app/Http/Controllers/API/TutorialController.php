<?php

namespace App\Http\Controllers\API;

use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use App\Models\TutorialCategory;

class TutorialController extends Controller {
    private $success_status = 200;

    /**
     * Method to retrieve all the published tutorials.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPublishedTutorials() {
        $tutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json(['tutorials' => $tutorials], $this->success_status);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTutorialCategories() {
        return response()->json(['tutorial_categories' => TutorialCategory::all()], $this->success_status);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLastPublishedTutorials() {
        $lastTutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return response()->json(['last_tutorials' => $lastTutorials], $this->success_status);
    }

    /**
     * @param string $filterValue
     * @return \Illuminate\Http\JsonResponse
     */
    public function tutorialByCategorie(string $filterValue) {
        $category = TutorialCategory::where('filter_value', '=', $filterValue)
            ->get();

        $tutorials = Tutorial::where('tutorial_category_id', '=', $category)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json(['tutorials' => $tutorials], $this->success_status);
    }

    /**
     * @param int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id) {

        $tutorial = Tutorial::where('id', '=', $id)->first();
        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        return response()->json(['tutorial' => $tutorial], $this->success_status);
    }

    /**
     * @param int $categoryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRelatedTutorialFromCategoryId(int $categoryId) {
        $relatedTutorials = Tutorial::where('Apitutorial_category_id', '=', $categoryId)
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

        return response()->json(['related_tutorials' => $relatedTutorials], $this->success_status);
    }
}
