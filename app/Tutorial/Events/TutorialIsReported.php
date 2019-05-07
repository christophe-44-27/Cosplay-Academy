<?php

namespace App\Tutorial\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TutorialIsReported
{
    use Dispatchable, SerializesModels;
    public $tutorial;

    /**
     * Create a new event instance.
     *
     * @param $tutorial
     */
    public function __construct($tutorial) {
        $this->tutorial = $tutorial;
    }
}
