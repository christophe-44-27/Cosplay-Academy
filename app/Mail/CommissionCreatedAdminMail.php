<?php

namespace App\Mail;

use App\Models\Commission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommissionCreatedAdminMail extends Mailable {
    use Queueable, SerializesModels;

    /** @var Commission */
    private $commission;

    /**
     * CommissionCreatedAdminMail constructor.
     * @param Commission $commission
     */
    public function __construct(Commission $commission) {
        $this->commission = $commission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('contact@cosplayschool.ca')
            ->subject("Enregistrement d'une offre de commission sur le site")
            ->view('emails.commission_created_admin_mail')
            ->with([
                'commission' => $this->commission
            ]);
    }
}
