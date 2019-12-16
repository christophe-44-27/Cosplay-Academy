<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use Filterable;

    protected $table = 'tutorials';
    public $timestamps = true;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the tutorial's reviews.
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userFavorites()
    {
        return $this->belongsToMany(User::class, 'tutorial_user_favorites', 'tutorial_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content_price()
    {
        return $this->belongsTo(ContentPrice::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tutorialViews()
    {
        return $this->belongsToMany(User::class, 'tutorial_view_users');
    }

    /**
     * Method used to customise the model binding key name inside RouteServiceProvider.
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
