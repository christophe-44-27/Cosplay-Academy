<?php

namespace App\Forum\Notifications;

use Illuminate\Notifications\Notification;

class ThreadWasUpdated extends Notification {
    /**
     * The thread that was updated.
     *
     * @var \App\Forum\Models\ForumTopic
     */
    protected $thread;
    /**
     * The new reply.
     *
     * @var \App\Forum\Models\Reply
     */
    protected $reply;

    /**
     * Create a new notification instance.
     *
     * @param \App\Forum\Models\ForumTopic $thread
     * @param \App\Forum\Models\Reply $reply
     */
    public function __construct($thread, $reply) {
        $this->thread = $thread;
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via() {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray() {
        return [
            'message' => $this->reply->owner->name . ' replied to ' . $this->thread->title,
            'link' => $this->reply->path(),
        ];
    }
}
