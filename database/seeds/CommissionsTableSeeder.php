<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Category;
use App\Models\Commission;
use Carbon\Carbon;

class CommissionsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Commission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior)")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 1")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 2")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'in_review' => false,
                'is_published' => true,
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 3")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 4")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 5")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 6")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 7")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 8")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'is_published' => true,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 9")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 10")
            ]
        );
        DB::table('commissions')->insert(
            [
                'title' => "Armure de Zelda (Warrior)",
                'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rhoncus urna, 
eu viverra urna. Mauris dapibus quam id nunc molestie, vel vehicula nibh placerat. Proin luctus mollis lorem, sed 
aliquam magna pretium volutpat. Suspendisse potenti. Etiam non nibh massa. In viverra arcu at quam ultrices, 
consequat tempor nisl finibus. Mauris sagittis mi ante, nec iaculis mi pretium at. In non leo et justo pellentesque 
dignissim. Pellentesque efficitur at mi eu sagittis.</p>',
                'max_budget' => 150,
                'delivery_location' => 'Ville de Québec',
                'desired_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'cover_path' => 'commissions/thumbnails/image_default.jpg',
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'category_id' => Category::where('name', "Artisanat")->first()->id,
                'slug' => str_slug("Armure de Zelda (Warrior) 11")
            ]
        );
    }
}
