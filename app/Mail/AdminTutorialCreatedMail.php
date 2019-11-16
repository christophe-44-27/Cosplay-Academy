<?php

namespace App\Mail;

use App\Models\Tutorial;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminTutorialCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Tutorial $tutorial */
    public $tutorial;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tutorial $tutorial)
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
        return $this->view('emails.administrators.tutorial_created');
    }
}
