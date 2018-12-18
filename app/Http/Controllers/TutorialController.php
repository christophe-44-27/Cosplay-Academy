<?php

namespace App\Http\Controllers;

use App\Mail\ReportTutorialMail;
use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use App\Models\TutorialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TutorialController extends Controller {

    public function index() {
        $tutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->get();

        $lastTutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $categories = TutorialCategory::all();

        return view('tutorials.frontend.index', compact('tutorials', 'categories', 'lastTutorials'));
    }

    public function tutorialByCategorie(string $filterValue) {
        $category = TutorialCategory::where('filter_value', '=', $filterValue)
            ->firstOrFail();

        $categories = TutorialCategory::all();

        $tutorials = Tutorial::where('tutorial_category_id', '=', $category->id)
            ->where('is_published', '=', true)
            ->orderBy('id', 'desc')
            ->get();

        $lastTutorials = Tutorial::where('is_published', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        return view('tutorials.frontend.index', compact('tutorials', 'category', 'categories', 'lastTutorials'));
    }

    public function show(Request $request, string $slug) {

        $tutorial = Tutorial::where('slug', '=', $slug)
            ->where('is_published', '=', true)
            ->firstOrFail();
        $tutorial->nb_views = $tutorial->nb_views + 1;
        $tutorial->save();

        $currentUrl = $request->url();

        $relatedTutorials = Tutorial::where('tutorial_category_id', '=', $tutorial->tutorialCategory->id)
                                ->where('is_published', '=', true)
                                ->orderBy('id', 'DESC')
                                ->limit(4)
                                ->get();

        return view('tutorials.frontend.show', compact('tutorial', 'currentUrl', 'relatedTutorials'));
    }

    /**
     * This method is used to report some tutorial that are not in some good quality or
     * no allowed by the CGU.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function reportTutorial(Request $request, int $id){
        if (!Auth::check()) {
            $request->session()->flash('error', 'Veuillez vous connecter pour signaler un tutoriel.');
            return redirect(route('login'));
        }
        $tutorial = Tutorial::where('id', '=', $id)->firstOrFail();

        $tutorial->is_reported = true;
        $tutorial->save();

        Mail::to('contact@cosplayschool.ca')->send(new ReportTutorialMail($tutorial));

        $request->session()->flash('success', 'Le tutoriel a bien été signalé !');
        return redirect(route('tutorials'));
    }
}
