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
        Schema::create('tutorials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->longText('content');
            $table->string('url_video', 255)->nullable();
            $table->string('video_id', 255)->nullable();
            $table->string('thumbnail_picture', 255);
            $table->boolean('is_published')->default(0);
            $table->integer('difficulty')->default(1);
            $table->string('video_path')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('content_price_id');
            $table->boolean('is_reported')->default(false);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->foreign('user_id', 'fk_user_id')->references('id')->on('users');
            $table->foreign('content_price_id')->references('id')->on('content_prices');
            $table->string('slug', 255);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });

        DB::statement('ALTER TABLE tutorials ADD FULLTEXT title(title, content)');
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
