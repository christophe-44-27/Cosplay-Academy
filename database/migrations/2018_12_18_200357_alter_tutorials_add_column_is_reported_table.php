<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTutorialsAddColumnIsReportedTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tutorials', function (Blueprint $table) {
            $table->boolean('is_reported')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tutorials', function (Blueprint $table) {
            $table->dropColumn('is_reported');
        });
    }
}
