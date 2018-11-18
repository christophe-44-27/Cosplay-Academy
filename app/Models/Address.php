<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
	protected $table = 'address';
	public $timestamps = true;
	protected $fillable = [
		'street_name',
		'apartment',
		'zip_code',
		'city',
		'country_id',
		'user_address_id',
		'province_id'
	];

	public function user() {
		return $this->belongsTo('App\User', 'fk_user_id');
	}
}
