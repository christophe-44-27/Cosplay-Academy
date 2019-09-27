<?php

namespace App\Mail;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportTutorialMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Course
     */
    public $tutorial;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Course $tutorial)
    {
        $this->tutorial = $tutorial;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@cosplayschool.ca')
        ->subject("Signalement d'un tutoriel")
        ->view('emails.tutorial_reported_email');
    }
}
