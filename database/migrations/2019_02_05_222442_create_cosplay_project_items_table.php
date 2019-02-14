<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosplayProjectItemsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cosplay_project_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_type');
            $table->string('name');
            $table->float('cost')->default(0.00);
            $table->boolean('is_completed')->default(0);
            $table->text('description');
            $table->integer('progress')->default(0);
            $table->integer('making_hours')->default(0);
            $table->integer('making_minutes')->default(0);
            $table->unsignedInteger('cosplay_project_id');
            $table->foreign('cosplay_project_id')->references('id')->on('cosplay_projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cosplay_project_items');
    }
}
