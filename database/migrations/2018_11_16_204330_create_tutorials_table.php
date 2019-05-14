<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if(!Schema::hasTable('tutorials') && !Schema::hasColumns('tutorials',
				['id', 'content', 'url_video', 'video_id', 'thumbnail_picture', 'main_picture', 'is_published',
				'nb_views', 'nb_likes', 'tutorial_category_id', 'user_id', 'slug'])) {
			Schema::create('tutorials', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title', 255);
				$table->text('content');
				$table->string('url_video', 255)->nullable();
				$table->string('video_id', 255)->nullable();
				$table->string('thumbnail_picture', 255);
				$table->string('main_picture', 255);
				$table->boolean('is_published')->default(0);
				$table->integer('nb_views');
				$table->integer('nb_likes');
				$table->integer('category_id')->unsigned();
				$table->integer('user_id')->unsigned();
				$table->foreign('category_id', 'fk_category_id')->references('id')->on('categories');
				$table->foreign('user_id', 'fk_user_id')->references('id')->on('users');
				$table->string('slug', 255);
				$table->timestamps();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tutorials');
	}
}
