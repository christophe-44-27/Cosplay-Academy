<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Session;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorialSessionController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function newSession(Course $tutorial)
    {
        $controller = 'courses';
        return view('professor.courses.add_sessions', compact('tutorial', 'controller'));
    }

    /**
     * @param Course $tutorial
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Course $tutorial, Request $request)
    {
        $session = new Session();
        $session->name = $request->get('name');
        $session->course_id = $tutorial->id;
        $session->save();

        return redirect(route('professor_course_edit', $tutorial))->with('success', "La session a bien été ajoutée.");
    }

    /**
     * @param Course $tutorial
     * @param Session $session
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $tutorial, Session $session)
    {
        return view('professor.courses.edit_session', compact('tutorial', 'session'));
    }

    /**
     * @param Course $course
     * @param Session $session
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Course $course, Session $session, Request $request)
    {
        $datas = [
            'name' => $request->get('name'),
        ];

        $session->update($datas);

        return redirect(route('professor_course_edit', $course))->with('success', "La session a bien été modifiée.");
    }

    /**
     * @param Course $course
     * @param Session $session
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function remove(Course $course, Session $session)
    {
        $session->delete();

        return redirect(route('professor_course_edit', $course))->with('success', "La session et son contenu ont bien été supprimés");
    }
}
