<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model {
	protected $table = 'tutorials';
	public $timestamps = true;
	protected $fillable = [
		'title',
		'content',
		'url_video',
		'video_id',
		'thumbnail_picture',
		'main_picture',
		'is_published',
		'nb_views',
		'nb_likes',
		'tutorial_category_id',
		'user_id',
		'slug',
		'is_reported'
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function tutorialCategory() {
		return $this->belongsTo('App\Models\TutorialCategory');
	}
}
