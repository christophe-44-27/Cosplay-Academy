<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceColumnsTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasColumns('tutorials', ['price']))) {
            Schema::table('tutorials', function (Blueprint $table) {
                $table->float('price')->nullable();
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
        if ((Schema::hasColumns('tutorials', ['price']))) {
            Schema::table('tutorials', function (Blueprint $table) {
                $table->dropColumn('price');
            });
        }
    }
}
