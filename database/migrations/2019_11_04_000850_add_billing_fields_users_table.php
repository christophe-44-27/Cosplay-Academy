<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBillingFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasColumn('users', 'brand'))) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('brand')->nullable();
                $table->string('last4')->nullable();
                $table->string('expiration')->nullable();
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
        if ((Schema::hasColumn('users', 'brand'))) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('brand');
                $table->dropColumn('last4');
                $table->dropColumn('expiration');
            });
        }
    }
}
