<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TutorialWasReported extends Notification {
    /**
     * The thread that was updated.
     *
     * @var \App\Models\Course
     */
    protected $tutorial;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Course $tutorial
     */
    public function __construct($tutorial) {
        $this->tutorial = $tutorial;
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
        $url = url(route('tutorial_show', $this->tutorial->slug));

        return (new MailMessage)
            ->from("contact@cosplayschool.ca")
            ->subject("Un tutoriel a été signalé")
            ->view('emails.tutorials.tutorial_is_reported', [
                'title' => $this->tutorial->title,
                'url' => $url,
            ]);
    }
}
