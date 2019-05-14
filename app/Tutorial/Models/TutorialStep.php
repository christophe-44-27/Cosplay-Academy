<?php

namespace App\Tutorial\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialStep extends Model {
    protected $table = 'tutorial_steps';
    protected $guarded = [];
    public $timestamps = false;
}
