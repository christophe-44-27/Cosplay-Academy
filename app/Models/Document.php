<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {
    protected $table = 'documents';
    protected $guarded = [];
    public $timestamps = true;

    public static function boot() {
        parent::boot();

        static::creating(function ($document) {
            $document->path = 'documents/tutorials/' . $document->filename;
        });
    }

    public function documentable(){
        return $this->morphTo();
    }
}
