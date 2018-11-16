<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model {
	protected $table = 'tutorials';
	public $timestamps = true;
	protected $fillable = [
		'title',
		'resume_introduction',
		'type', 'slug',
		'url_video',
		'video_id',
		'path',
		'cover_path',
		'current_state',
		'nb_views'
	];
}
