<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosplayProjectsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cosplay_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('character_name');
            $table->string('series_name');
            $table->float('budget');
            $table->dateTime('starting_date');
            $table->dateTime('due_date');
            $table->integer('cosplay_status');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cosplay_projects');
    }
}
