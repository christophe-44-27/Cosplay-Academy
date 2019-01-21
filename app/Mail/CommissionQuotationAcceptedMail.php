<?php

namespace App\Mail;

use App\Models\CommissionQuotation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommissionQuotationAcceptedMail extends Mailable {
    use Queueable, SerializesModels;
    /** @var CommissionQuotation */
    public $commissionQuotation;

    /** @var string */
    public $answerQuotation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CommissionQuotation $commissionQuotation, string $answerQuotation) {
        $this->commissionQuotation = $commissionQuotation;
        $this->answerQuotation = $answerQuotation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from($this->commissionQuotation->commission->user->email)
            ->subject("Votre proposition a été acceptée !")
            ->view('emails.commission_quotation_accepted');
    }
}
