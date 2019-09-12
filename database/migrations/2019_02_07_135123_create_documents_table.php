<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->string('path');
            $table->string('type');
            $table->unsignedBigInteger('documentable_id');
            $table->string('documentable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('documents');
    }
}
