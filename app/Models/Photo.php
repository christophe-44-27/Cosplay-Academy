<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    protected $table = 'photos';
    protected $fillable = [
        'title',
        'album_id',
        'image_path',
        'slug'
    ];
    public $timestamps = true;

    public function album() {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
