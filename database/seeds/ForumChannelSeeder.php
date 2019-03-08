<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Forum\Models\Channel;
use Carbon\Carbon;

class ForumChannelSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Channel::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('forum_channels')->insert(
            [
                'name' => "Général",
                'slug' => "general",
                'short_description' => "Parlons de tout et de rien, tant que ça touche le Cosplay",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Trucs & Astuces",
                'slug' => "tips",
                'short_description' => "Besoin d'une solution rapidement ?",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Taverne",
                'slug' => "tavern",
                'short_description' => "L'endroit rêvé pour les trolls et autres personnes louches",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
    }
}
