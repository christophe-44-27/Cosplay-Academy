<?php

namespace App\Forum\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model {
    protected $table = 'forum_topics';
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'forum_id',
        'slug',
        'is_pinned',
        'to_moderate',
        'is_locked',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function forum() {
        return $this->belongsTo(Thread::class, 'forum_id');
    }

    public function latestTopicAnswer()
    {
        return $this->hasOne(Reply::class)->latest();
    }

    public function topicAnswers() {
        return $this->hasMany(Reply::class);
    }
}
