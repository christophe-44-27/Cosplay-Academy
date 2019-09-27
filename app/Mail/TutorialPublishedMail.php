<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorialPublishedMail extends Mailable {
    use Queueable, SerializesModels;

    /**
     * @var Course $tutorial
     */
    public $tutorial;

    /**
     * TutorialPublishedMail constructor.
     *
     * @param Course $tutorial
     */
    public function __construct(Course $tutorial) {
        $this->tutorial = $tutorial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('contact@cosplayschool.ca')
            ->subject("Votre tutoriel a bien été publié !")
            ->view('emails.tutorials_published_email');
    }
}
