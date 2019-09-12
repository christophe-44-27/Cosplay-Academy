<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Album extends Model {
    protected $table = 'albums';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'is_published',
        'gallery_category_id',
        'slug',
        'cover_image',
        'cover_frontend',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function galleryCategory() {
        return $this->belongsTo(GalleryCategory::class);
    }
}
