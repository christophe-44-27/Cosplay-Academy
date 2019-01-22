<?php

namespace App\Mail;

use App\Models\CommissionQuotation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommissionQuotationHasBeenSubmittedMail extends Mailable {
    use Queueable, SerializesModels;

    /** @var CommissionQuotation */
    public $commissionQuotation;

    /**
     * CommissionQuotationHasBeenSubmittedMail constructor.
     * @param CommissionQuotation $commissionQuotation
     */
    public function __construct(CommissionQuotation $commissionQuotation) {
        $this->commissionQuotation = $commissionQuotation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from("contact@cosplayschool.ca")
            ->subject("Vous avez reçu une nouvelle soumission")
            ->view('emails.commission_quotation_submitted');
    }
}
