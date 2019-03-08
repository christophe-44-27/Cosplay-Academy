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
            $table->string('short_description')->nullable(true);
            $table->string('slug');
            $table->unsignedInteger('channel_id')->nullable(true);
            $table->integer('order')->nullable(true);
            $table->string('icon')->nullable(true);
            $table->integer('position')->nullable(true);
            $table->foreign('channel_id')->references('id')->on('forum_channels');
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
