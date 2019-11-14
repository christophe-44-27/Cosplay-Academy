<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Filterable;

    protected $table = 'courses';
    public $timestamps = true;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::created(function($course){
            $course->recordFeed('created');
        });

        static::updated(function($course){
            $course->recordFeed('updated');
        });

        static::deleted(function($course){
            $course->recordFeed('deleted');
        });
    }

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
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(CourseType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    /**
     * Get all of the tutorial's reviews.
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Get all of the course's payments.
     */
    public function payments()
    {
        return $this->morphMany(Earning::class, 'paymentable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userFavorites()
    {
        return $this->belongsToMany(User::class, 'course_user_favorites', 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userViews()
    {
        return $this->belongsToMany(User::class, 'course_view_users');
    }

    /**
     * Method used to customise the model binding key name inside RouteServiceProvider.
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participants()
    {
        return $this->belongsToMany(User::class, 'course_participations', 'course_id');
    }

    /**
     * @param $event
     */
    public function recordFeed($event)
    {
        $this->feeds()->create([
            'user_id' => auth()->id(),
            'type' => $event . '_' . strtolower(class_basename($this)),
        ]);
    }

    /**
     * Get all of the course's feeds.
     */
    public function feeds()
    {
        return $this->morphMany(Feed::class, 'feedable');
    }
}
