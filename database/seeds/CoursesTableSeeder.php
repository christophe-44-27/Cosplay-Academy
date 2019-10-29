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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'featured' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'featured' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'gratuit')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'featured' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'featured' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'featured' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'price' => 12.50,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'price' => 12.50,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'en')->first()->id,
                'price' => 12.50,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'price' => 12.50,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'price' => 12.50,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'price' => 12.50,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'price' => 12.50,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'price' => 12.50,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'price' => 12.50,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'price' => 12.50,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
                'category_id' => \App\Models\Category::where('name', 'Couture')->first()->id,
                'user_id' =>  \App\Models\User::where('email', 'email@email.ca')->first()->id,
                'type_id' =>  \App\Models\CourseType::where('name', 'premium')->first()->id,
                'price' => 12.50,
                'language_id' => \App\Models\Language::where('code_iso', 'fr')->first()->id,
                'slug' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );

        DB::table('courses')->insert(
            [
                'title' => Str::random(10),
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
                'introduction' => Str::random(255),
                'thumbnail_picture' => 'courses/thumbnails/740x440.png',
                'is_published' => rand(0,1),
                'video_path' => '1568214961docklands_clocks00_preview.mp4',
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
