<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;

class TutorialCategoriesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('categories')->insert(
            [
                'name' => "Couture",
                'filter_value' => "sewing",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Artisanat",
                'filter_value' => "crafting",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Conception 3D",
                'filter_value' => "three_d",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Photographie",
                'filter_value' => "photography",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Electronique",
                'filter_value' => "electronic",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Patronnage",
                'filter_value' => "pattern",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Création d'accessoires",
                'filter_value' => "props",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Guide",
                'filter_value' => "guide",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Divers",
                'filter_value' => "misc",
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Maquillage",
                'filter_value' => "makeup",
            ]
        );
    }
}
