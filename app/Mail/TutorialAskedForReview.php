<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorialAskedForReview extends Mailable {
    use Queueable, SerializesModels;

    /**
     * @var Course
     */
    public $tutorial;

    /**
     * TutorialAskedForReview constructor.
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
            ->view('emails.tutorials_ask_for_review_admin_email')
            ->subject('Demande de revue de tutoriel');
    }
}
