<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tutorial;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TutorialsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Tutorial::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('tutorials')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'main_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'tutorial_category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\User::where('email', 'email@email.ca')->first()->id,
                'slug' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
    }
}
