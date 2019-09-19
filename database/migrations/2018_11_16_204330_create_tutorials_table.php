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
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('content');
            $table->string('thumbnail_picture');
            $table->boolean('is_published')->default(0);
            $table->integer('nb_views')->default(0);
            $table->integer('nb_likes')->default(0);
            $table->integer('difficulty')->default(1);
            $table->text('keywords')->nullable();
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('language_id');
            $table->foreign('category_id', 'fk_tutorial_category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('tutorial_types');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->string('slug');
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
