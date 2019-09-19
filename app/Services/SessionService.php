<?php
/**
 * Created by PhpStorm.
 * User: clablancherie
 * Date: 30/08/2019
 * Time: 14:25
 */

namespace App\Http\Services;

use App\Models\Article;
use App\Models\Session;
use App\Models\Tutorial;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class SessionService
{

    /**
     * @param string $contentType
     * @param null $videoFile
     * @param null $article
     * @return Article|Video|null
     */
    private function createContent(string $contentType, $videoFile = null, $article = null)
    {
        switch ($contentType)
        {
            case 'video':

                $filename = time() . $videoFile->getClientOriginalName();
                $filePath = 'tutorials/videos/' . $filename;
                Storage::disk('s3')->put($filePath, file_get_contents($videoFile), ['ACL' => 'public-read']);

                $content = new Video();
                $content->name = $filename;
                $content->save();

                break;
            case 'article':

                $content = new Article();
                $content->content = $article;
                $content->save();

                break;
            default:
                $content = null;
                break;
        }

        return $content;
    }

}
