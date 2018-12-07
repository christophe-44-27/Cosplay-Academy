<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionSwitchPlanEmail extends Mailable {
    use Queueable, SerializesModels;

    /** @var array */
    private $datas;

    /**
     * SubscriptionSwitchPlanEmail constructor.
     * @param array $datas
     */
    public function __construct(array $datas) {
        $this->datas = $datas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.subscription_switch_plan_email')
            ->with([
                'old_plan' => $this->datas['old_plan'],
                'new_plan' => $this->datas['new_plan'],
                'username' => $this->datas['username']
            ]);
    }
}
