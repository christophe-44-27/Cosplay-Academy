<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Content;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Session;
use Illuminate\Support\Facades\Validator;

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
        $messages = [
            'name.required' => 'Veuillez indiquer un nom de contenu',
            'video_session.required' => "Vous devez spécifier un fichier vidéo.",
            'video_session.mimetypes' => "Votre fichier ne correspond pas à une vidéo.",
            'video_script.required' => "Veuillez remplir la partie script pour rendre la vidéo plus accessible.",
            'article_content.required' => "Veuillez rédiger un contenu pour votre article."
        ];

        switch ($request->get('content_type'))
        {
            case 'article':

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'article_content' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    return redirect(route('dashboard_tutorial_new_content', ['course' => $tutorial, 'session' => $session]))
                        ->withErrors($validator)
                        ->withInput();
                }

                $tutorialContent = new Content();
                $tutorialContent->name = $request->get('name');
                $tutorialContent->type = $request->get('content_type');
                $tutorialContent->content_article = $request->get('article_content');
                $tutorialContent->session_id = $session->id;
                $tutorialContent->free = ($request->get('free') == 'on') ? true : false;
                $tutorialContent->save();

                return redirect(route('professor_course_edit', $tutorial))->with('success', "Le contenu a bien été ajouté au cours.");
                break;

            case 'video':

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'video_session' => 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
                    'video_script' => 'required',
               ], $messages);

                if ($validator->fails()) {
                    return redirect(route('dashboard_tutorial_new_content', ['course' => $tutorial, 'session' => $session]))
                        ->withErrors($validator)
                        ->withInput();
                }

                $content = new Content();
                $path = $content->video_name;

                if($request->file('video_session'))
                {
                    $path = Storage::disk('s3')->put('tutorials/videos', $request->file('video_session'), 'public');
                }

                if($path) {
                    $datas = [
                        'name' => $request->get('name'),
                        'type' => $request->get('content_type'),
                        'session_id' => $session->id,
                        'free' => ($request->get('free') == 'on') ? true : false,
                        'content_article' => null,
                        'video_script' => $request->get('video_script'),
                        'video_name' => $path
                    ];
                }

                Content::create($datas);

                return redirect(route('professor_course_edit', $tutorial))->with('success', "Le contenu a bien été ajouté au cours.");
                break;
            default:
                break;
        }
    }

    /**
     * @param Course $tutorial
     * @param Content $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Course $tutorial, Content $content)
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
     * @param Content $content
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Course $tutorial, Content $content, Request $request)
    {
        $datas = [];

        $messages = [
            'name.required' => 'Veuillez indiquer un nom de contenu',
            'video_session.required' => "Vous devez spécifier un fichier vidéo.",
            'video_session.mimetypes' => "Votre fichier ne correspond pas à une vidéo.",
            'video_script.required' => "Veuillez remplir la partie script pour rendre la vidéo plus accessible.",
            'article_content.required' => "Veuillez rédiger un contenu pour votre article."
        ];

        switch ($request->get('content_type'))
        {
            case 'article':
                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'article_content' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    return redirect(route('dashboard_tutorial_edit_content', ['course' => $tutorial, 'content' => $content]))
                        ->withErrors($validator)
                        ->withInput();
                }

                $datas = [
                    'name' => $request->get('name'),
                    'type' => $request->get('content_type'),
                    'free' => ($request->get('free') == 'on') ? true : false,
                    'content_article' => $request->get('article_content'),
                    'video_name' => null
                ];

                if ($content->video_name) {
                    Storage::disk('s3')->delete($content->video_name);
                }

                break;
            case 'video':
                $path = $content->video_name;

                $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'video_session' => 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
                    'video_script' => 'required',
                ], $messages);

                if ($validator->fails()) {
                    return redirect(route('dashboard_tutorial_edit_content', ['course' => $tutorial, 'content' => $content]))
                        ->withErrors($validator)
                        ->withInput();
                }

                if($request->file('video_session'))
                {
                    $path = Storage::disk('s3')->put('tutorials/videos', $request->file('video_session'), 'public');
                }


                if($path) {
                    $datas = [
                        'name' => $request->get('name'),
                        'type' => $request->get('content_type'),
                        'free' => ($request->get('free') == 'on') ? true : false,
                        'video_script' => $request->get('video_script'),
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

    public function deleteContent(Course $course, Content $content)
    {
        $content->delete();

        return redirect(route('professor_course_edit', $course))->with('success', Lang::get("Votre contenu a bien été supprimé !"));
    }
}
