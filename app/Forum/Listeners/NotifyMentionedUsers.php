<?php

namespace App\Forum\Listeners;

use App\Forum\Events\ThreadReceivedNewReply;
use App\Forum\Notifications\YouWereMentioned;
use App\User;

class NotifyMentionedUsers {
    /**
     * Handle the event.
     *
     * @param  ThreadReceivedNewReply $event
     * @return void
     */
    public function handle(ThreadReceivedNewReply $event) {
        User::whereIn('name', $event->reply->mentionedUsers())
            ->get()
            ->each(function ($user) use ($event) {
                $user->notify(new YouWereMentioned($event->reply));
            });
    }
}
