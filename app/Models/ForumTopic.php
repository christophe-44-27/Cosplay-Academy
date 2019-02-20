<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model {
    protected $table = 'forum_topics';
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'is_pinned',
        'to_moderate',
        'is_locked',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
}
