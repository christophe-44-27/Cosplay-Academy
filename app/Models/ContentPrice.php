<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPrice extends Model
{
    protected $table = 'content_prices';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
