<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CosplayProjectReferenceImage extends Model {
    protected $table = 'cosplay_project_reference_images';
    protected $fillable = [
        'path',
        'cosplay_project_item_id',
    ];
    public $timestamps = false;
}
