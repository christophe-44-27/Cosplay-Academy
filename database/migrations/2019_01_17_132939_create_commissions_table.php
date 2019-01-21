<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cover_path');
            $table->longText('description');
            $table->float('max_budget');
            $table->string('delivery_location');
            $table->dateTime('desired_delivery_date');
            $table->integer('nb_views')->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_ended')->default(false);
            $table->boolean('in_review')->default(true);
            $table->boolean('is_reported')->default(false);
            $table->boolean('is_published')->default(false);
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tutorial_categories');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('commissions');
    }
}
