<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->timestamps();
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('slug', 255);
            $table->string('cover_image', 255);
            $table->string('cover_frontend', 255);
            $table->boolean('is_published')->default(false);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('gallery_category_id')->unsigned();
            $table->foreign('gallery_category_id')->references('id')->on('gallery_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('gallery_categories');
        Schema::dropIfExists('albums');
    }
}
