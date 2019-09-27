<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder {
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
                'icon_name' => 'fa fa-scissors',
                'featured' => true,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Artisanat",
                'filter_value' => "crafting",
                'icon_name' => 'fa fa-modx',
                'featured' => true,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Conception 3D",
                'filter_value' => "three_d",
                'icon_name' => 'fa fa-desktop',
                'featured' => true,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Photographie",
                'filter_value' => "photography",
                'icon_name' => 'lol',
                'featured' => false,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Electronique",
                'filter_value' => "electronic",
                'icon_name' => 'lol',
                'featured' => false,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Patronnage",
                'filter_value' => "pattern",
                'icon_name' => 'lol',
                'featured' => false,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Accessoires",
                'filter_value' => "props",
                'icon_name' => 'fa fa-wrench',
                'featured' => true,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Guide",
                'filter_value' => "guide",
                'icon_name' => 'fa fa-handshake-o',
                'featured' => true,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Divers",
                'filter_value' => "misc",
                'icon_name' => 'lol',
                'featured' => false,
            ]
        );
        DB::table('categories')->insert(
            [
                'name' => "Maquillage",
                'filter_value' => "makeup",
                'icon_name' => 'fa fa-paint-brush',
                'featured' => true,
            ]
        );
    }
}
