<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('users', function (Blueprint $table) {
			$table->string('firstname', 255)->nullable();
			$table->string('lastname', 255)->nullable();
			$table->text('description')->nullable();
			$table->string('stripe_customer_id', 255)->nullable();
			$table->dateTime('last_login')->nullable();
			$table->boolean('is_teacher')->default(0);
			$table->boolean('enabled')->default(0);
			$table->boolean('blocked')->default(0);
			$table->string('public_pseudonym', 255)->nullable();
			$table->string('facebook_page', 255)->nullable();
			$table->string('twitter_page', 255)->nullable();
			$table->string('instagram_page', 255)->nullable();
			$table->string('youtube_page', 255)->nullable();
			$table->string('website', 255)->nullable();
			$table->string('profile_picture', 255)->nullable();
			$table->string('cover_picture', 255)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn([
				'firstname',
				'lastname',
				'description',
				'stripe_customer_id',
				'last_login',
				'is_teacher',
				'enabled',
				'blocked',
				'public_pseudonym',
				'facebook_page',
				'twitter_page',
				'instagram_page',
				'youtube_page',
				'website',
				'profile_picture',
				'cover_picture',
			]);
		});
	}
}
