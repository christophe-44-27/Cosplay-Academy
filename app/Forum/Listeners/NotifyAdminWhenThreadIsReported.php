<?php

namespace App\Forum\Listeners;

use App\Forum\Events\ThreadIsReported;
use App\Notifications\ThreadWasReported;
use App\User;

class NotifyAdminWhenThreadIsReported {
    /**
     * Handle the event.
     *
     * @param  ThreadIsReported $event
     * @return void
     */
    public function handle(ThreadIsReported $event) {
        $adminUser = User::where('is_admin', '=', true)->firstOrFail();
        $adminUser->notify(new ThreadWasReported($event->thread));
    }
}
