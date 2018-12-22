<?php

namespace App;

use App\Models\Address;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, Notifiable, Billable;

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
        'youtube_page',
        'facebook_page',
        'instagram_page',
        'website',
        'twitter_page',
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

    public function address() {
        return $this->hasOne(Address::class, 'user_address_id');
    }
}
