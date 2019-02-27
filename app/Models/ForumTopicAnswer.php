<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ForumTopicAnswer extends Model {
    protected $table = 'forum_topic_answers';
    protected $fillable = [
        'content',
        'forum_topic_id',
        'user_id',
        'to_moderate',
        'is_displayed',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
