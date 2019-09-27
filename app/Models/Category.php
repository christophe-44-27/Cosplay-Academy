<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['name', 'filter_value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tutorials() {
        return $this->hasMany(Course::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commissions() {
        return $this->hasMany(Commission::class, 'category_id')
            ->where('is_published', '=', true);
    }
}
