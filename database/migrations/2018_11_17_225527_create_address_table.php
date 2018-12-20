<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('address') && !Schema::hasColumns('address',
                ['id', 'street_name', 'apartment', 'zip_code', 'city', 'country_id', 'user_address_id'])) {
            Schema::create('address', function (Blueprint $table) {
                $table->increments('id');
                $table->string('street_name', 255);
                $table->string('apartment', 255)->nullable();
                $table->string('zip_code', 100);
                $table->string('city', 100);
                $table->integer('country_id')->unsigned();
                $table->foreign('country_id', 'fk_country_id')->references('id')->on('countries');
                $table->integer('user_address_id')->unsigned();
                $table->foreign('user_address_id', 'fk_user_address_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('address');
    }
}
