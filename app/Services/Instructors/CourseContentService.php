<?php

namespace App\Services\Instructors;

use App\Models\Content;
use Illuminate\Http\Request;

class CourseContentService {

    /**
     * @param Request $request
     * @param int $session_id
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function createContent(Request $request, int $session_id)
    {
        try{
            $content = new Content();
            $content->name = $request->get('name');
            $content->type = $request->get('content_type');
            $content->content_article = $request->get('article_content');
            $content->session_id = $session_id;
            $content->free = ($request->get('free') == 'on') ? true : false;
            $content->save();

            return true;
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
    }

    /**
     * @param Request $request
     * @param int $session_id
     * @param string $video_name
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function createContentWithS3Upload(Request $request, int $session_id, string $video_name)
    {
        try{
            $content = new Content();

            $content->name = $request->get('name');
            $content->type = $request->get('content_type');
            $content->content_article = null;
            $content->video_script = $request->get('video_script');
            $content->session_id = $session_id;
            $content->video_name = $video_name;
            $content->free = ($request->get('free') == 'on') ? true : false;
            $content->save();

            return true;
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage())->withInput();
        }
    }
}
