<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if(!Schema::hasTable('tutorial_categories') && !Schema::hasColumns('tutorial_categories',
				['id', 'name', 'filter_value'])) {
			Schema::create('tutorial_categories', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name', 255)->nullable(false);
				$table->string('filter_value', 255)->nullable(false);

			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tutorial_categories');
	}
}
