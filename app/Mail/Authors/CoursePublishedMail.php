<?php

namespace App\Mail\Authors;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CoursePublishedMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Course $course */
    public $course;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Cosplay Academy - Votre cours a bien validé et publié !")
            ->view('emails.administrators.course_created');
    }
}
