<?php

namespace App\Models;

use App\Tutorial\Events\TutorialIsReported;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model {

    protected $table = 'tutorials';
    public $timestamps = true;
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function documents() {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function tutorial_steps() {
        return $this->morphMany(TutorialStep::class, 'tutorial_stepable');
    }

    /**
     * @param $tutorial
     * @return void
     */
    public function report($tutorial) {
        event(new TutorialIsReported($tutorial));
    }
}
