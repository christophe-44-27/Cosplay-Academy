<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'categories';
	public $timestamps = false;
	protected $fillable = ['name', 'filter_value'];

	public function user() {
		return $this->hasMany('App\Models\Tutorial');
	}
}
