<?php

namespace App\Mail;

use App\Models\Commission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommissionCreatedMail extends Mailable {
    use Queueable, SerializesModels;

    /** @var Commission */
    private $commission;

    /**
     * CommissionCreatedMail constructor.
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
            ->subject("Confirmation d'enregistrement de votre offre sur la Cosplay School")
            ->view('emails.commission_created_mail')
            ->with([
                'commission' => $this->commission
            ]);
    }
}
