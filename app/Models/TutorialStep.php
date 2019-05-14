<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialStep extends Model {
    protected $table = 'tutorial_steps';
    public $timestamps = false;
    protected $guarded = [];

    public function tutorial_stepable(){
        return $this->morphTo();
    }
}
