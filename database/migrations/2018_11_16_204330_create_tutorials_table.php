<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorials', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 255);
            $table->longText('content');
            $table->string('url_video', 255)->nullable();
            $table->string('video_id', 255)->nullable();
            $table->string('thumbnail_picture', 255);
            $table->string('main_picture', 255);
            $table->boolean('is_published')->default(0);
            $table->integer('nb_views');
            $table->integer('nb_likes');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->foreign('category_id', 'fk_tutorial_category_id')->references('id')->on('categories');
            $table->foreign('user_id', 'fk_user_id')->references('id')->on('users');
            $table->string('slug', 255);
            $table->boolean('is_reported')->default(false);
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
        Schema::dropIfExists('tutorials');
    }
}
