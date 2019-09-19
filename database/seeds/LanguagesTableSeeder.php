<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Language::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('languages')->insert(
            [
                'name' => "Français",
                'code_iso' => "fr",
            ]
        );

        DB::table('languages')->insert(
            [
                'name' => "English",
                'code_iso' => 'en'
            ]
        );
    }
}
