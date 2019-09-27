<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CourseType;

class CourseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CourseType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('course_types')->insert(
            [
                'name' => "gratuit",
            ]
        );

        DB::table('course_types')->insert(
            [
                'name' => "premium",
            ]
        );
    }
}
