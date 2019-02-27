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
            $table->unsignedInteger('forum_section_id')->nullable(true);
            $table->integer('order')->nullable(true);
            $table->string('icon')->nullable(true);
            $table->foreign('forum_section_id')->references('id')->on('forum_sections');
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
