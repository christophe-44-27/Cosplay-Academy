<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Session;
use App\Models\Course;
use App\Models\CourseContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseContentController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function newContent(Course $tutorial, Session $session)
    {
        $controller = 'courses';
        return view('dashboard.tutorial-contents.new_content', compact('tutorial', 'session', 'controller'));
    }

    public function store(Course $tutorial, Session $session, Request $request)
    {
        switch ($request->get('content_type'))
        {
            case 'article':

                $tutorialContent = new CourseContent();
                $tutorialContent->name = $request->get('name');
                $tutorialContent->type = $request->get('content_type');
                $tutorialContent->content_article = $request->get('article_content');
                $tutorialContent->session_id = $session->id;
                $tutorialContent->save();

                return redirect(route('professor_course_edit', $tutorial))->with('success', "Le contenu a bien été ajouté au cours.");
                break;

            case 'video':
                break;
            default:
                break;
        }
    }

    /**
     * @param Course $tutorial
     * @param CourseContent $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $tutorial, CourseContent $content)
    {
        $types = ['article' => 'Articles', 'video' => 'Vidéo'];
        $url_video = null;
        $video = null;

        $controller = 'courses';

        if($content->video_name)
        {
            $video = Storage::disk('s3')->getAdapter()->getClient()->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key' => $content->video_name,
            ]);
        }

        $url_video = $video['@metadata']['effectiveUri'];

        return view('dashboard.tutorial-contents.edit_content', compact('tutorial', 'content', 'types', 'url_video', 'controller'));
    }

    /**
     * @param Course $tutorial
     * @param CourseContent $content
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Course $tutorial, CourseContent $content, Request $request)
    {
        $datas = [];

        switch ($request->get('content_type'))
        {
            case 'article':
                $datas = [
                    'name' => $request->get('name'),
                    'type' => $request->get('content_type'),
                    'content_article' => $request->get('article_content'),
                    'video_name' => null
                ];

                if ($content->video_name) {
                    Storage::disk('s3')->delete($content->video_name);
                }

                break;
            case 'video':
                $path = $content->video_name;

                if($request->file('video_session'))
                {
                    $path = Storage::disk('s3')->put('tutorials/videos', $request->file('video_session'), 'public');
                }

                if($path) {
                    $datas = [
                        'name' => $request->get('name'),
                        'type' => $request->get('content_type'),
                        'content_article' => null,
                        'video_name' => $path
                    ];
                }

                break;
            default:
                break;
        }

        $content->update($datas);

        return redirect(route('professor_course_edit', $tutorial))->with('success', "Le contenu a bien été mis à jour.");
    }

    /**
     * @param Course $tutorial
     * @param CourseContent $content
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function remove(Course $tutorial, CourseContent $content)
    {
        $content->delete($content);

        return redirect(route('professor_course_edit', $tutorial))->with('success', "La session et son contenu ont bien été supprimés");
    }
}
