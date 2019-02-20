<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTopicAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_topic_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');
            $table->unsignedInteger('forum_topic_id');
            $table->foreign('forum_topic_id')->references('id')->on('forum_topics');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('to_moderate')->default(false);
            $table->boolean('is_displayed')->default(true);
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
        Schema::dropIfExists('forum_topic_answers');
    }
}
