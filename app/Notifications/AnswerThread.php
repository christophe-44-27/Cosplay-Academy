<?php

namespace App\Notifications;

use App\Forum\Models\Thread;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AnswerThread extends Notification {
    use Queueable;

    private $_thread;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Thread $thread) {
        $this->_thread = $thread;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        return (new MailMessage)
            ->from("contact@cosplayschool.ca")
            ->subject("Une nouvelle réponse a été apportée au sujet " . $this->_thread->title)
            ->greeting("Hello " . $this->_thread->creator->name)
            ->line('The introduction to the notification.')
            ->action('Voir le sujet', url(route('show_forum_thread', $this->_thread->slug)))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
