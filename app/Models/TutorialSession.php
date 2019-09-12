<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialSession extends Model {
    protected $table = 'tutorial_sessions';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function tutorial_sessionable(){
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
