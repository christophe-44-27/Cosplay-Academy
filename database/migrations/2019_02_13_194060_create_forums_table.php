<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('short_description');
            $table->unsignedInteger('forum_category_id');
            $table->foreign('forum_category_id')->references('id')->on('forum_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('forums');
    }
}
