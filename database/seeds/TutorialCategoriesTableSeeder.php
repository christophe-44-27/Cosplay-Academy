<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TutorialCategory;
use Carbon\Carbon;

class TutorialCategoriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        TutorialCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('tutorial_categories')->insert(
            [
                'name' => "Couture",
                'filter_value' => "sewing",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Artisanat",
                'filter_value' => "crafting",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Conception 3D",
                'filter_value' => "three_d",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Photographie",
                'filter_value' => "photography",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Electronique",
                'filter_value' => "electronic",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Patronnage",
                'filter_value' => "pattern",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Création d'accessoires",
                'filter_value' => "props",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Guide",
                'filter_value' => "guide",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Divers",
                'filter_value' => "misc",
            ]
        );
        DB::table('tutorial_categories')->insert(
            [
                'name' => "Maquillage",
                'filter_value' => "makeup",
            ]
        );
    }
}
