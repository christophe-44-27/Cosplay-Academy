<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Album extends Model {
    protected $table = 'albums';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'is_published',
        'category_id',
        'slug',
        'cover_image',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
