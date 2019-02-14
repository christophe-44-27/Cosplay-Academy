<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CosplayProject extends Model {
    protected $table = 'cosplay_projects';
    protected $fillable = [
        'cosplay_status',
        'character_name',
        'series_name',
        'starting_date',
        'due_date',
        'budget',
        'user_id'
    ];
    public $timestamps = true;
}
