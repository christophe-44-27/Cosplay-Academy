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
                'name' => "Couture",
                'slug' => "sewing",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'needle.png',
                'position' => '1'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Patronnage",
                'slug' => "blueprint",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'blueprint.png',
                'position' => '1'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Electronique",
                'slug' => "electronique",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'led.png',
                'position' => '1'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Accessoires",
                'slug' => "props",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'stage-props.png',
                'position' => '1'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Artisanat",
                'slug' => "crafting",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'rug.png',
                'position' => '1'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Peinture",
                'slug' => "painting",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'tools.png',
                'position' => '1'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Le foam",
                'slug' => "foams",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'mat.png',
                'position' => '2'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Les thermoplastiques",
                'slug' => "thermoplastics",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'mat-worbla.png',
                'position' => '2'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Le tissu",
                'slug' => "fabrics",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'clothing.png',
                'position' => '2'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "La colle",
                'slug' => "glue",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'caulk.png',
                'position' => '2'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "La peinture",
                'slug' => "paint",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'spray.png',
                'position' => '2'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Les wigs",
                'slug' => "wigs",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'icon' => 'wig.png',
                'position' => '2'
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Général",
                'slug' => "general",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Trucs & Astuces",
                'slug' => "tips",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        DB::table('forum_channels')->insert(
            [
                'name' => "Taverne",
                'slug' => "tavern",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
    }
}
