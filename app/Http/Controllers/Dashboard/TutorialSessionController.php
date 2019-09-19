<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Session;
use App\Models\Tutorial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorialSessionController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function newSession(Tutorial $tutorial)
    {
        return view('dashboard.tutorials.add_sessions', compact('tutorial'));
    }

    /**
     * @param Tutorial $tutorial
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Tutorial $tutorial, Request $request)
    {
        $session = new Session();
        $session->name = $request->get('name');
        $session->tutorial_id = $tutorial->id;
        $session->save();

        return redirect(route('tutorial_edit', $tutorial))->with('success', "La session a bien été ajoutée.");
    }

    /**
     * @param Tutorial $tutorial
     * @param Session $session
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tutorial $tutorial, Session $session)
    {
        return view('dashboard.tutorials.edit_session', compact('tutorial', 'session'));
    }

    /**
     * @param Tutorial $tutorial
     * @param Session $session
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Tutorial $tutorial, Session $session, Request $request)
    {
        $datas = [
            'name' => $request->get('name'),
        ];

        $session->update($datas);

        return redirect(route('tutorial_edit', $tutorial))->with('success', "La session a bien été modifiée.");
    }

    /**
     * @param Tutorial $tutorial
     * @param Session $session
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function remove(Tutorial $tutorial, Session $session)
    {
        $session->delete();

        return redirect(route('tutorial_edit', $tutorial))->with('success', "La session et son contenu ont bien été supprimés");
    }
}
