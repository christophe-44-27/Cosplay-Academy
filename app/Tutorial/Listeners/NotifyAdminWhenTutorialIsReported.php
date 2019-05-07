<?php

namespace App\Tutorial\Listeners;

use App\Notifications\TutorialWasReported;
use App\Tutorial\Events\TutorialIsReported;
use App\User;

class NotifyAdminWhenTutorialIsReported {
    /**
     * Handle the event.
     *
     * @param  TutorialIsReported $event
     * @return void
     */
    public function handle(TutorialIsReported $event) {
        $adminUser = User::where('is_admin', '=', true)->firstOrFail();
        $adminUser->notify(new TutorialWasReported($event->tutorial));
    }
}
