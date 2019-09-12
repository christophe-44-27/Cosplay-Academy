<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use App\Models\Category;
use App\Services\TutorialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorialController extends Controller {

    public function index(TutorialService $tutorialService) {
        $tutorials = Tutorial::where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        $lastTutorials = $tutorialService->getTutorials(3);

        $categories = Category::all();

        return view('tutorials.frontend.index', compact('tutorials', 'categories', 'lastTutorials'));
    }

    public function tutorialByCategorie(string $filterValue, TutorialService $tutorialService) {
        $category = Category::where('filter_value', '=', $filterValue)
            ->firstOrFail();

        $categories = Category::all();

        $tutorials = Tutorial::where('category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->paginate(15);

        $lastTutorials = $tutorialService->getTutorials(3);

        return view('tutorials.frontend.index', compact('tutorials', 'category', 'categories', 'lastTutorials'));
    }

    public function show(Request $request, string $slug) {

        $tutorial = Tutorial::where('slug', '=', $slug)
            ->where('is_published', '=', true)
            ->firstOrFail();

        $object = Storage::disk('s3')->getAdapter()->getClient()->getObject([
            'Bucket' => env('AWS_BUCKET'),
            'Key' => 'tutorials/videos/' . $tutorial->video_id,
            'SaveAs' => $tutorial->video_id
        ]);

        $url_video = $object['@metadata']['effectiveUri'];

        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        $currentUrl = $request->url();

        $relatedTutorials = Tutorial::where('category_id', '=', $tutorial->category->id)
                                ->where('is_published', '=', true)
                                ->orderBy('id', 'DESC')
                                ->limit(4)
                                ->get();

        return view('frontend.tutorials.show', compact('tutorial', 'currentUrl', 'relatedTutorials', 'url_video'));
    }

    /**
     * This method is used to report some tutorial that are not in some good quality or
     * no allowed by the CGU.
     * @param Request $request
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reportTutorial(Request $request, Tutorial $tutorial){
        $tutorial->is_reported = true;
        $tutorial->save();

        $tutorial->report($tutorial);

        $request->session()->flash('success', 'Le tutoriel a bien été signalé !');
        return redirect(route('tutorials'));
    }
}
