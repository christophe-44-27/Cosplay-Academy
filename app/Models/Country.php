<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
	protected $table = 'countries';
	public $timestamps = true;
	protected $fillable = [
		'name',
		'code_iso'
	];
}
