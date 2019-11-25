<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScriptFieldCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasColumns('contents', ['video_script', 'mark_as_done']))) {
            Schema::table('contents', function (Blueprint $table) {
                $table->longText('video_script')->nullable();
                $table->boolean('mark_as_done')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ((Schema::hasColumns('contents', ['video_script', 'mark_as_done']))) {
            Schema::table('contents', function (Blueprint $table) {
                $table->dropColumn('video_script');
                $table->dropColumn('mark_as_done');
            });
        }
    }
}
