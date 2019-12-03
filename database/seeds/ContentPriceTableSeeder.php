<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ContentPrice;

class ContentPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ContentPrice::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('content_prices')->insert(
            [
                'name' => "Gratuit",
                'amount_in_cents' => 0,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "5.99 $ (Tarif 1)",
                'amount_in_cents' => 599,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "9.99 $ (Tarif 2)",
                'amount_in_cents' => 999,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "14.99 $ (Tarif 3)",
                'amount_in_cents' => 1499,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "19.99 $ (Tarif 5)",
                'amount_in_cents' => 1999,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "24.99 $ (Tarif 6)",
                'amount_in_cents' => 2499,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "29.99 $ (Tarif 7)",
                'amount_in_cents' => 2999,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "34.99 $ (Tarif 8)",
                'amount_in_cents' => 3499,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "39.99 $ (Tarif 9)",
                'amount_in_cents' => 3999,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "44.99 $ (Tarif 10)",
                'amount_in_cents' => 4499,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "49.99 $ (Tarif 11)",
                'amount_in_cents' => 4999,
                'country_id' => \App\Models\Country::where('iso_code', 'ca')->first()->id,
            ]
        );



        // Tarifs en euros

        DB::table('content_prices')->insert(
            [
                'name' => "Gratuit",
                'amount_in_cents' => 0,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "5.99 € (Tarif 1)",
                'amount_in_cents' => 599,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "9.99 € (Tarif 2)",
                'amount_in_cents' => 999,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "14.99 € (Tarif 3)",
                'amount_in_cents' => 1499,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "19.99 € (Tarif 5)",
                'amount_in_cents' => 1999,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "24.99 € (Tarif 6)",
                'amount_in_cents' => 2499,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "29.99 € (Tarif 7)",
                'amount_in_cents' => 2999,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "34.99 € (Tarif 8)",
                'amount_in_cents' => 3499,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "39.99 € (Tarif 9)",
                'amount_in_cents' => 3999,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "44.99 € (Tarif 10)",
                'amount_in_cents' => 4499,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );

        DB::table('content_prices')->insert(
            [
                'name' => "49.99 € (Tarif 11)",
                'amount_in_cents' => 4999,
                'country_id' => \App\Models\Country::where('iso_code', 'fr')->first()->id,
            ]
        );
    }
}
