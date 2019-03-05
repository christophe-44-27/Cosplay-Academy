<?php
/**
 * Created by PhpStorm.
 * User: clablancherie
 * Date: 04/03/2019
 * Time: 14:27
 */

namespace App\Forum\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Forum\Models\Favorite;

trait Favoritable {
    /**
     * Boot the trait.
     */
    protected static function bootFavoritable() {
        static::deleting(function ($model) {
            $model->favorites->each->delete();
        });
    }

    /**
     * A reply can be favorited.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites() {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    /**
     * Favorite the current reply.
     *
     * @return Model
     */
    public function favorite() {
        $attributes = ['user_id' => auth()->id()];
        if (!$this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    /**
     * Unfavorite the current reply.
     */
    public function unfavorite() {
        $attributes = ['user_id' => auth()->id()];
        $this->favorites()->where($attributes)->get()->each->delete();
    }

    /**
     * Determine if the current reply has been favorited.
     *
     * @return boolean
     */
    public function isFavorited() {
        return !!$this->favorites->where('user_id', auth()->id())->count();
    }

    /**
     * Fetch the favorited status as a property.
     *
     * @return bool
     */
    public function getIsFavoritedAttribute() {
        return $this->isFavorited();
    }

    /**
     * Get the number of favorites for the reply.
     *
     * @return integer
     */
    public function getFavoritesCountAttribute() {
        return $this->favorites->count();
    }

}
