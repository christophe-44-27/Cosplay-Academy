<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $table = 'course_contents';
    public $timestamps = false;
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
