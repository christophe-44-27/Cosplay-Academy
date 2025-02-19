<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('introduction');
            $table->string('thumbnail_picture')->nullable();
            $table->string('main_picture')->nullable();
            $table->boolean('is_published')->default(0);
            $table->integer('difficulty')->default(1);
            $table->string('video_path')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('content_price_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('content_price_id')->references('id')->on('content_prices');
            $table->string('slug');
            $table->boolean('is_reported')->default(false);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE courses ADD FULLTEXT title(title, introduction)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
