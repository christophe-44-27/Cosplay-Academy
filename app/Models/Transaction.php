<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = [];
    public $timestamps = true;

    /**
     * Get the owning commentable model.
     */
    public function transactionable()
    {
        return $this->morphTo();
    }
}
