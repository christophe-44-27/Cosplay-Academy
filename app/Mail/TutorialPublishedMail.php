<?php

namespace App\Mail;

use App\Models\Tutorial;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorialPublishedMail extends Mailable {
    use Queueable, SerializesModels;

    /**
     * @var Tutorial $tutorial
     */
    public $tutorial;

    /**
     * TutorialPublishedMail constructor.
     *
     * @param Tutorial $tutorial
     */
    public function __construct(Tutorial $tutorial) {
        $this->tutorial = $tutorial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('contact@cosplayschool.ca')
            ->subject('Publication de votre tutoriel')
            ->view('emails.tutorials_published_email');
    }
}
