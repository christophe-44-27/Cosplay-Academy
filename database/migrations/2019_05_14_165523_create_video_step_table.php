<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoStepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url_video');
            $table->text('content');
            $table->unsignedInteger('tutorial_id');
            $table->foreign('tutorial_id')->references('id')->on('tutorials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_steps');
    }
}
