<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ThreadWasReported extends Notification {
    /**
     * The thread that was updated.
     *
     * @var \App\Forum\Models\Thread
     */
    protected $thread;

    /**
     * Create a new notification instance.
     *
     * @param \App\Forum\Models\Thread $thread
     */
    public function __construct($thread) {
        $this->thread = $thread;
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
        $urlThread = url(route('show_forum_thread', $this->thread->slug));

        return (new MailMessage)
            ->from("contact@cosplayschool.ca")
            ->subject("Un sujet a été signalé")
            ->view('emails.thread_is_reported', [
                'thread_title' => $this->thread->title,
                'url_thread' => $urlThread,
            ]);
    }
}
