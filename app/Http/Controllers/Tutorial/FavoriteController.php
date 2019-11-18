<?php

namespace App\Http\Controllers\Tutorial;

use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use App\Services\TutorialService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class FavoriteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTutorialFavorites()
    {
        $user = Auth::user();

        $favorites = new Collection();

        if ($user->tutorialFavorites->count() > 0) {
            $favorites = $user->tutorialFavorites;
        }

        $action = 'tutorial_favorites';

        return view('tutorials.connected_user_favorites', compact('favorites', 'action'));
    }

    /**
     * @param TutorialService $tutorialService
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addToFavorite(TutorialService $tutorialService, Tutorial $tutorial) {
        $user = Auth::user();

        $status = $tutorialService->addTutorialToFavorite($user, $tutorial);

        notify()->success(Lang::get($status));

        return redirect(route('tutorial_favorite'));
    }

    /**
     * @param TutorialService $tutorialService
     * @param Tutorial $tutorial
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeFromFavorites(TutorialService $tutorialService, Tutorial $tutorial) {
        $user = Auth::user();

        $status = $tutorialService->removeTutorialToFavorite($user, $tutorial);

        notify()->success(Lang::get($status));

        return redirect(route('tutorial_favorite'));
    }
}
