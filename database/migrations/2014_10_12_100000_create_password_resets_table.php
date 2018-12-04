<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if(!Schema::hasTable('password_resets') && !Schema::hasColumns('password_resets', ['email', 'token', 'created_at'])) {
			Schema::create('password_resets', function (Blueprint $table) {
				$table->string('email')->index();
				$table->string('token');
				$table->timestamp('created_at')->nullable();
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('password_resets');
	}
}
