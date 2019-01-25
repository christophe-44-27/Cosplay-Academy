<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialCategory extends Model {
	protected $table = 'tutorial_categories';
	public $timestamps = false;
	protected $fillable = ['name', 'filter_value'];

	public function tutorials() {
		return $this->hasMany('App\Models\Tutorial');
	}

    public function commissions() {
        return $this->hasMany(Commission::class, 'category_id')
            ->where('is_published', '=', true);
    }
}
