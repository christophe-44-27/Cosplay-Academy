<?php

namespace App\Models;

use App\Models\Tutorial;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    protected $guarded = [];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tutorial()
    {
        return $this->belongsTo(Tutorial::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function content()
    {
        return $this->hasOne(TutorialContent::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
            $user->content()->delete();
            // do the rest of the cleanup...
        });
    }
}
