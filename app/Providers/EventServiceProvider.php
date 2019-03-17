<?php

namespace App\Providers;

use App\Forum\Events\ReplyIsReported;
use App\Forum\Events\ThreadIsReported;
use App\Forum\Events\ThreadReceivedNewReply;
use App\Forum\Listeners\NotifyAdminWhenReplyIsReported;
use App\Forum\Listeners\NotifyAdminWhenThreadIsReported;
use App\Forum\Listeners\NotifyMentionedUsers;
use App\Forum\Listeners\NotifySubscribers;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ThreadReceivedNewReply::class => [
            NotifyMentionedUsers::class,
            NotifySubscribers::class
        ],
        ThreadIsReported::class => [
            NotifyAdminWhenThreadIsReported::class
        ],
        ReplyIsReported::class => [
            NotifyAdminWhenReplyIsReported::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
