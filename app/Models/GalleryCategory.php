<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model {
    protected $fillable = ['name', 'slug'];
    protected $table = 'gallery_categories';
    public $timestamps = true;
}
