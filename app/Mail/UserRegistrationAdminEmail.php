<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationAdminEmail extends Mailable {
    use Queueable, SerializesModels;

    /** @var User */
    public $user;

    /**
     * UserRegistrationAdminEmail constructor.
     *
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.user_registration_admin_email');
    }
}
