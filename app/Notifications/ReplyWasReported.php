<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReplyWasReported extends Notification {
    /**
     * The thread that was updated.
     *
     * @var \App\Forum\Models\Reply
     */
    protected $reply;

    /**
     * Create a new notification instance.
     *
     * @param \App\Forum\Models\Reply $reply
     */
    public function __construct($reply) {
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
            ->subject("Une réponse a été signalée")
            ->view('emails.reply_is_reported', [
                'thread_title' => $this->reply->thread->title,
                'body_answer' => $this->reply->body,
                'url_thread' => $urlThread,
            ]);
    }
}
