<?php

namespace App\Forum\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model {
    protected $table = 'forum_channels';

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}
