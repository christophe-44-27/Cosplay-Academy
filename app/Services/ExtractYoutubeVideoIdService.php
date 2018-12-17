<?php

namespace App\Services;


use App\Exceptions\YoutubeVideoIdNotFoundException;

class ExtractYoutubeVideoIdService {
    /** @var string $video_id */
    private $video_id;

    /**
     * @param string $videoUrl
     * @return string
     * @throws YoutubeVideoIdNotFoundException
     */
    public function retrieveYoutubeVideoId(string $videoUrl) {
        $videoParams = explode("v=", $videoUrl);

        if (count($videoParams) > 1) {
            $this->video_id = $videoParams[1];
            return $this->video_id;
        }

        throw new YoutubeVideoIdNotFoundException('Veuillez saisir une url de vidéo valide.');
    }
}
