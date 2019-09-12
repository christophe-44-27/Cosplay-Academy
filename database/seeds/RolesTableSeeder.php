<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('roles')->insert(
            [
                'name' => "cosplayer",
            ]
        );

        DB::table('roles')->insert(
            [
                'name' => "fan",
            ]
        );

        DB::table('roles')->insert(
            [
                'name' => "admin",
            ]
        );
    }
}
