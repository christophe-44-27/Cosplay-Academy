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
}
