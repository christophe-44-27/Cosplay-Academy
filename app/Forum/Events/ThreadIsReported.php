<?php

namespace App\Forum\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ThreadIsReported
{
    use Dispatchable, SerializesModels;
    public $thread;

    /**
     * Create a new event instance.
     *
     * @param $thread
     */
    public function __construct($thread) {
        $this->thread = $thread;
    }
}
