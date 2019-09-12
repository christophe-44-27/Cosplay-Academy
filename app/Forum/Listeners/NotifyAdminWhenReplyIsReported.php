<?php

namespace App\Forum\Listeners;

use App\Forum\Events\ReplyIsReported;
use App\Notifications\ReplyWasReported;
use App\Models\User;

class NotifyAdminWhenReplyIsReported {
    /**
     * Handle the event.
     *
     * @param  ReplyIsReported $event
     * @return void
     */
    public function handle(ReplyIsReported $event) {
        $adminUser = User::where('is_admin', '=', true)->firstOrFail();
        $adminUser->notify(new ReplyWasReported($event->reply));
    }
}
