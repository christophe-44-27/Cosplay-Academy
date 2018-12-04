<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddressTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasColumn('address', 'province_id')) {
			Schema::table('address', function (Blueprint $table) {
				$table->addColumn('integer', 'province_id')->unsigned();
				$table->foreign('province_id', 'fk_province_id')->references('id')->on('provinces');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('address', function (Blueprint $table) {
			$table->dropColumn('province_id');
		});
	}
}
