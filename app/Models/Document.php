<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {
    protected $table = 'documents';
    protected $fillable = [
        'filename',
        'type',
        'documentable_id',
        'documentable_type',
        'path'
    ];
    public $timestamps = true;
}
