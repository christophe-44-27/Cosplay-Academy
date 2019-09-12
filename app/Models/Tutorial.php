<?php

namespace App\Models;

use App\Tutorial\Events\TutorialIsReported;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model {

    protected $table = 'tutorials';
    public $timestamps = true;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function documents() {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function tutorial_steps() {
        return $this->morphMany(TutorialSession::class, 'tutorial_stepable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(TutorialType::class);
    }

    /**
     * @param $tutorial
     * @return void
     */
    public function report($tutorial) {
        event(new TutorialIsReported($tutorial));
    }
}
