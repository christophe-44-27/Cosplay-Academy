<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Session;
use App\Models\Tutorial;
use App\Models\TutorialContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorialContentController extends Controller {
    /**
     * TutorialController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function newContent(Tutorial $tutorial, Session $session)
    {
        return view('dashboard.tutorial-contents.new_content', compact('tutorial', 'session'));
    }

    public function store(Tutorial $tutorial, Session $session, Request $request)
    {
        switch ($request->get('content_type'))
        {
            case 'article':

                $tutorialContent = new TutorialContent();
                $tutorialContent->name = $request->get('name');
                $tutorialContent->type = $request->get('content_type');
                $tutorialContent->content_article = $request->get('article_content');
                $tutorialContent->session_id = $session->id;
                $tutorialContent->save();

                return redirect(route('tutorial_edit', $tutorial))->with('success', "Le contenu a bien été ajouté au cours.");
                break;

            case 'video':
                break;
            default:
                break;
        }
    }

    /**
     * @param Tutorial $tutorial
     * @param TutorialContent $content
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tutorial $tutorial, TutorialContent $content)
    {
        $types = ['article' => 'Articles', 'video' => 'Vidéo'];
        $url_video = null;
        $video = null;

        if($content->video_name)
        {
            $video = Storage::disk('s3')->getAdapter()->getClient()->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key' => $content->video_name,
            ]);
        }

        $url_video = $video['@metadata']['effectiveUri'];

        return view('dashboard.tutorial-contents.edit_content', compact('tutorial', 'content', 'types', 'url_video'));
    }

    /**
     * @param Tutorial $tutorial
     * @param TutorialContent $content
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Tutorial $tutorial, TutorialContent $content, Request $request)
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

        return redirect(route('tutorial_edit', $tutorial))->with('success', "Le contenu a bien été mis à jour.");
    }

    /**
     * @param Tutorial $tutorial
     * @param TutorialContent $content
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function remove(Tutorial $tutorial, TutorialContent $content)
    {
        $content->delete($content);

        return redirect(route('tutorial_edit', $tutorial))->with('success', "La session et son contenu ont bien été supprimés");
    }
}
