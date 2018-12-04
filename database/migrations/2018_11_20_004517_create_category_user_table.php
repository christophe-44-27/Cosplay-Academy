<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryUserTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasTable('category_user') && !Schema::hasColumns('category_user', ['id', 'user_id', 'category_id'])) {
			Schema::create('category_user', function (Blueprint $table) {
				$table->increments('id');

				$table->integer('user_id')->unsigned();
				$table->integer('category_id')->unsigned();

				$table->foreign('user_id', 'fk_user_categorie_id')->references('id')->on('users');
				$table->foreign('category_id', 'fk_category_id')->references('id')->on('categories');
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
		Schema::dropIfExists('category_user');
	}
}
