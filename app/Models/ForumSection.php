<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForumSection extends Model {
    protected $table = 'forum_sections';
    protected $fillable = ['title'];
    public $timestamps = false;
}
