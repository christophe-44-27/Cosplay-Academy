<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CosplayProjectItem extends Model {
    protected $table = 'cosplay_project_items';
    protected $fillable = [
        'item_type',
        'name',
        'cost',
        'is_completed',
        'description',
        'progress',
        'making_hours',
        'making_minutes',
        'cosplay_project_id'
    ];
    public $timestamps = true;
}
