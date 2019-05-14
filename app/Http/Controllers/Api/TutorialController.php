<?php

namespace App\Http\Controllers\Api;

use App\Mail\ReportTutorialMail;
use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class TutorialController extends Controller {

    /**
     * This method return an array of tutorial, paginated
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
        $tutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate($request->get('limit'));

        $categories = Category::all();

        return response()->json([
            'tutorials' => $tutorials,
            'categories' => $categories
        ],200);
    }

    /**
     * With this method we can search tutorials by categories or by keyword
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request) {

        if ($request->get('filter_value')){
            $category = Category::where('filter_value', '=', $request->get('filter_value'))
                ->firstOrFail();

            $tutorials = Tutorial::where('tutorial_category_id', '=', $category->id)
                ->where('is_published', '=', true)
                ->orderBy('id', 'desc')
                ->paginate($request->get('limit'));
        } else {

            $tutorials = Tutorial::select([
                'id',
                'title',
                'content',
                'url_video',
                'video_id',
                'thumbnail_picture',
                'main_picture',
                'is_published',
                'nb_views',
                'nb_likes',
                'tutorial_category_id',
                'user_id',
                'slug',
                'created_at',
                'updated_at',
                'is_reported',
            ])
            ->whereRaw("MATCH(title) AGAINST('" . $request->get('title') . "*' IN BOOLEAN MODE)")
            ->where('is_published', '=', true)
            ->paginate($request->get('limit'));
        }

        $categories = Category::all();

        return response()->json([
            'tutorials' => $tutorials,
            'categories' => $categories
        ],200);
    }

    /**
     * This method return a tutorial and it's related tutorials.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request) {

        $tutorial = Tutorial::where('slug', '=', $request->get('slug'))
            ->where('is_published', '=', true)
            ->firstOrFail();

        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        $relatedTutorials = Tutorial::where('tutorial_category_id', '=', $tutorial->tutorialCategory->id)
                                ->where('is_published', '=', true)
                                ->orderBy('id', 'DESC')
                                ->limit(4)
                                ->get();

        return response()->json([
            'tutorial' => $tutorial,
            'related_tutorials' => $relatedTutorials
        ],200);
    }
}
