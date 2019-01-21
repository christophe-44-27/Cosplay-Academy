<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommissionQuotation extends Model {
    protected $table = 'commission_quotations';
    protected $fillable = [
        'description',
        'price',
        'estimated_delivery_date',
        'is_accepted',
        'user_id',
        'commission_id',
    ];
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commission() {
        return $this->belongsTo(Commission::class, 'commission_id');
    }
}
