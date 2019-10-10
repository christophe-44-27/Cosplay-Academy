<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
         $this->call(UsersTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(CountriesTableSeeder::class);
         $this->call(LanguagesTableSeeder::class);
         $this->call(CourseTypesTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(CoursesTableSeeder::class);
    }
}
