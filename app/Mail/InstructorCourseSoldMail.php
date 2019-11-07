<?php

namespace App\Mail;

use App\Models\Earning;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstructorCourseSoldMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Earning $earning */
    public $earning;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Earning $earning)
    {
        $this->earning = $earning;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.instructors.course_sold');
    }
}
