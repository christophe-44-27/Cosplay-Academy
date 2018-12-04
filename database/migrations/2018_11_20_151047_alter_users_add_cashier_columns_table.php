<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddCashierColumnsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		if (!Schema::hasColumns('users', ['stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at'])) {
			Schema::table('users', function (Blueprint $table) {
				$table->string('stripe_id')->nullable()->collation('utf8mb4_bin');
				$table->string('card_brand')->nullable();
				$table->string('card_last_four', 4)->nullable();
				$table->timestamp('trial_ends_at')->nullable();
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
			$table->dropColumn('stripe_id');
			$table->dropColumn('card_brand');
			$table->dropColumn('card_last_four');
			$table->dropColumn('trial_ends_at');
		});
	}
}
