<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('stripe_customer_id', 255)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->boolean('enabled')->default(0);
            $table->boolean('blocked')->default(0);
            $table->string('public_pseudonym', 255)->nullable();
            $table->string('facebook_page', 255)->nullable();
            $table->string('twitter_page', 255)->nullable();
            $table->string('instagram_page', 255)->nullable();
            $table->string('youtube_page', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
