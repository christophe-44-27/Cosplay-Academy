<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCosplayProjectReferenceImagesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cosplay_project_reference_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->unsignedInteger('cosplay_project_item_id');
            $table->foreign('cosplay_project_item_id')->references('id')->on('cosplay_project_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('cosplay_project_reference_images');
    }
}
