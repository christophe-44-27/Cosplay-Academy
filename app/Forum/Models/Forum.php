<?php

namespace App\Forum\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model {
    /**
     * A forum belongs to a channel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function channel() {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    /**
     * A channel consists of threads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function threads() {
        return $this->hasMany(Thread::class);
    }

    public function lastThread() {
        return $this->hasOne(Thread::class)->latest();
    }
}
