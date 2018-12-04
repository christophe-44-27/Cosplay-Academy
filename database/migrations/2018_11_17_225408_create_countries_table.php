<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('countries') && !Schema::hasColumns('countries', ['id', 'name', 'code_iso'])) {
			Schema::create('countries', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name', 255);
				$table->string('code_iso', 50);
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
		Schema::dropIfExists('countries');
	}
}
