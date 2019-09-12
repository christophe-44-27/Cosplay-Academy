<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('categories') && !Schema::hasColumns('categories', ['id', 'name', 'filter_value'])) {
			Schema::create('categories', function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->string('name', 255)->nullable(false);
				$table->string('filter_value', 255)->nullable(false);
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
		Schema::dropIfExists('categories');
	}
}
