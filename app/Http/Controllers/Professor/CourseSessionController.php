<?php

namespace App\Http\Controllers\Professor;

use App\Models\Session;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseSessionController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Course $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newSession(Course $course)
    {
        $controller = 'courses';
        return view('professor.courses.add_sessions', compact('course', 'controller'));
    }

    /**
     * @param Course $course
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Course $course, Request $request)
    {
        $lastSavedSession = Session::where('course_id', '=', $course->id)->get()->last();

        $session = new Session();
        $session->name = $request->get('name');
        $session->course_id = $course->id;
        $session->order = ($lastSavedSession) ? $lastSavedSession->order + 1 : 1;
        $session->save();

        return redirect(route('professor_course_edit', $course))->with('success', "La session a bien été ajoutée.");
    }

    /**
     * @param Course $course
     * @param Session $session
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $course, Session $session)
    {
        $controller = 'courses';

        return view('professor.courses.edit_session', compact('course', 'session', 'controller'));
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

        $sessionsToRearrange = Session::where('course_id', '=', $course->id)->where('order', '>', $session->order)->get();

        foreach ($sessionsToRearrange as $sessionToReorder)
        {
            $sessionToReorder->order = $sessionToReorder->order - 1;
            $datas = [
                'order' => $sessionToReorder->order
            ];

            $sessionToReorder->update($datas);
        }

        $session->delete();

        return redirect(route('professor_course_edit', $course))->with('success', "La session et son contenu ont bien été supprimés");
    }
}
