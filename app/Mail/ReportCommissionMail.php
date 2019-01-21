<?php

namespace App\Mail;

use App\Models\Commission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportCommissionMail extends Mailable {
    use Queueable, SerializesModels;

    /** @var Commission */
    private $_commission;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Commission $commission) {
        $this->_commission = $commission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('contact@cosplayschool.ca')
            ->subject("Signalement d'une commission")
            ->view('emails.commission_reported_email');
    }
}
