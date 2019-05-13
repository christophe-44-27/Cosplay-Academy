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

    public function tutorialCategory() {
        return $this->belongsTo(TutorialCategory::class);
    }

    public function documents() {
        return $this->morphMany(Document::class, 'documentable')->orderBy('created_at', 'DESC');
    }

    /**
     * @param $tutorial
     * @return void
     */
    public function report($tutorial) {
        event(new TutorialIsReported($tutorial));
    }
}
