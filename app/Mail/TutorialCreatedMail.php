<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorialCreatedMail extends Mailable {
    use Queueable, SerializesModels;

    /**
     * @var Course
     */
    public $tutorial;

    /**
     * TutorialCreatedMail constructor.
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
            ->subject("Votre tutoriel a bien été créé !")
            ->view('emails.tutorials_created_email');
    }
}
