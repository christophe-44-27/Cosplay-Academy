<?php
/**
 * Created by PhpStorm.
 * User: clablancherie
 * Date: 04/03/2019
 * Time: 14:51
 */

namespace App\Forum\Models;

use App\Notifications\ThreadWasUpdated;
use Illuminate\Database\Eloquent\Model;
use App\User;

class ThreadSubscription extends Model {
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user associated with the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the thread associated with the subscription.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thread() {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Notify the related user that the thread was updated.
     *
     * @param \App\Forum\Models\Reply $reply
     */
    public function notify($reply) {
        $this->user->notify(new ThreadWasUpdated($this->thread, $reply));
    }
}
