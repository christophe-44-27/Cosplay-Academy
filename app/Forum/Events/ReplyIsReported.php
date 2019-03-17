<?php

namespace App\Forum\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReplyIsReported
{
    use Dispatchable, SerializesModels;
    public $reply;

    /**
     * Create a new event instance.
     *
     * @param $reply
     */
    public function __construct($reply) {
        $this->reply = $reply;
    }
}
