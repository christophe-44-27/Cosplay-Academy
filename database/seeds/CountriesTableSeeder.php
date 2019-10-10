<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use Illuminate\Support\Str;

class CountriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Country::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('countries')->insert(
            [
                'name' => 'Canada',
                'iso_code' => 'ca',
                'currency' => 'CAD',
            ]
        );

        DB::table('countries')->insert(
            [
                'name' => 'France',
                'iso_code' => 'fr',
                'currency' => 'EUR',
            ]
        );

        DB::table('countries')->insert(
            [
                'name' => 'Belgique',
                'iso_code' => 'be',
                'currency' => 'EUR',
            ]
        );
    }
}
