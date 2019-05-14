<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    protected $table = 'address';
    public $timestamps = true;
    protected $guarded = [];

    public static function boot() {
        parent::boot();

        static::creating(function ($address) {
            $address->user_address_id = auth()->user()->id;
        });
    }

    public function user() {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
