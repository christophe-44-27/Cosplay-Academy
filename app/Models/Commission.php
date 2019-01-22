<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model {
    protected $table = 'commissions';
    protected $fillable = [
        'title',
        'description',
        'max_budget',
        'delivery_location',
        'desired_delivery_date',
        'category_id',
        'user_id',
        'cover_path',
        'nb_views',
        'is_attributed',
        'is_published',
        'in_review',
        'is_reported',
        'slug'
    ];
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(TutorialCategory::class, 'category_id');
    }
}
