<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CoursesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Course::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'content' => Str::random(255),
                'thumbnail_picture' => Str::random(50) . '.jpg',
                'is_published' => rand(0,1),
                'nb_views' => rand(0,9999),
                'nb_likes' => rand(0,9999),
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
