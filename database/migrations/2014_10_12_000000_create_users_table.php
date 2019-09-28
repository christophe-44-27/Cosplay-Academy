<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('name')->unique();
            $table->string('password');
            $table->string('firstname', 255)->nullable();
            $table->string('lastname', 255)->nullable();
            $table->longText('description')->nullable();
            $table->string('facebook_profile', 255)->nullable();
            $table->string('youtube_profile', 255)->nullable();
            $table->string('instagram_profile', 255)->nullable();
            $table->string('pinterest_profile', 255)->nullable();
            $table->string('stripe_customer_id', 255)->nullable();
            $table->string('country')->nullable();
            $table->boolean('enabled')->default(0);
            $table->boolean('blocked')->default(0);
            $table->string('avatar', 255)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
