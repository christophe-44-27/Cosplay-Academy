<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model {
    protected $table = 'forum_categories';
    protected $fillable = ['title'];
    public $timestamps = false;
}
