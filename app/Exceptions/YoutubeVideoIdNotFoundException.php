<?php

namespace App\Exceptions;

use Exception;

class YoutubeVideoIdNotFoundException extends Exception {
    /**
     * Report or log an exception.
     * @return string
     */
    public function report() {
        return "Veuillez saisir une adresse de vidéo valide.";
    }

    /**
     * @return string
     */
    public function render() {
        return "Veuillez saisir une adresse de vidéo valide.";
    }
}
