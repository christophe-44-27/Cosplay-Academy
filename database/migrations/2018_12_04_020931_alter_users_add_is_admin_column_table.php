<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddIsAdminColumnTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasColumn('users', 'is_admin')) {
			Schema::table('users', function (Blueprint $table) {
				$table->addColumn('boolean', 'is_admin')->default(false);
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('users', function ($table) {
			$table->dropColumn('is_admin');
		});
	}
}
