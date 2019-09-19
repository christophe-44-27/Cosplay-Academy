<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialContent extends Model
{
    protected $table = 'tutorial_contents';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
