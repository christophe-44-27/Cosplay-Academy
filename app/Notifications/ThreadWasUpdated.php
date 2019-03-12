<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ThreadWasUpdated extends Notification {
    /**
     * The thread that was updated.
     *
     * @var \App\Forum\Models\Thread
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
     * @param \App\Forum\Models\Thread $thread
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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        $urlThread = url(route('show_forum_thread', $this->reply->thread->slug));

        return (new MailMessage)
            ->from("contact@cosplayschool.ca")
            ->subject("Forum de la Cosplay School - Une nouvelle réponse a été apportée au sujet")
            ->view('emails.thread_new_reply', [
                'thread_title' => $this->thread->title,
                'url_thread' => $urlThread,
            ]);
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
