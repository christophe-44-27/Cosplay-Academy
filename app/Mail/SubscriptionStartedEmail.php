<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionStartedEmail extends Mailable {
    use Queueable, SerializesModels;
    /**
     * @var array
     */
    private $datas;

    /**
     * Create a new message instance.
     * @param $datas array
     * @return void
     */
    public function __construct($datas = []) {
        $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.subscription_started');
    }
}
