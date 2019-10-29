<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseUserView extends Model
{
    protected $table = 'course_view_users';
    public $timestamps = false;
    protected $guarded = [];
}
