<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TutorialType;

class TutorialTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TutorialType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('tutorial_types')->insert(
            [
                'name' => "gratuit",
            ]
        );

        DB::table('tutorial_types')->insert(
            [
                'name' => "premium",
            ]
        );
    }
}
