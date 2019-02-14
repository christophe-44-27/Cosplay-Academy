<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model {
    protected $table = 'forums';
    protected $fillable = ['title', 'short_description', 'forum_category_id'];
    public $timestamps = false;
}