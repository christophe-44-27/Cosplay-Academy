<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail {
	use Notifiable;
	use Billable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'description',
		'password',
		'public_pseudonym',
		'firstname',
		'lastname',
		'profile_picture',
		'cover_picture',
		'stripe_id',
		'card_brand',
		'card_last_four',
		'trial_ends_at',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The roles that belong to the user.
	 */
	public function categories() {
		return $this->belongsToMany('App\Models\Category');
	}
}
