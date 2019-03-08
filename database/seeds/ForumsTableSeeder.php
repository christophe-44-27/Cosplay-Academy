<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Forum\Models\Forum;
use Carbon\Carbon;

class ForumsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Forum::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('forums')->insert(
            [
                'title' => "Couture",
                'slug' => "sewing",
                'short_description' => "Vous avez perdu le fil ?",
                'icon' => 'needle.png',
                'position' => '1'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Patronnage",
                'slug' => "blueprint",
                'short_description' => "Votre mètre à mesurer fait des siennes ?",
                'icon' => 'blueprint.png',
                'position' => '1'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Electronique",
                'slug' => "electronique",
                'short_description' => "Par où dois-je commencer avec ces LEDs ?",
                'icon' => 'led.png',
                'position' => '1'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Accessoires",
                'slug' => "props",
                'short_description' => "Quelqu'un aurait trouvé ma ward ?",
                'icon' => 'stage-props.png',
                'position' => '1'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Artisanat",
                'slug' => "crafting",
                'icon' => 'rug.png',
                'position' => '1'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Peinture",
                'slug' => "painting",
                'short_description' => "Vous voulez devenir le nouveau Picasso ?",
                'icon' => 'tools.png',
                'position' => '1'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Le foam",
                'slug' => "foams",
                'short_description' => "Le tapis, la crazy carpet, le eva foam ? Kesséssa?",
                'icon' => 'mat.png',
                'position' => '2'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Les thermoplastiques",
                'slug' => "thermoplastics",
                'short_description' => "Thermo...plastique ? Genre Worbla pi tout pi tout ?",
                'icon' => 'mat-worbla.png',
                'position' => '2'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Le tissu",
                'slug' => "fabrics",
                'short_description' => "Envie de vous lancer (pas trop fort) dans la couture ?",
                'icon' => 'clothing.png',
                'position' => '2'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "La colle",
                'slug' => "glue",
                'short_description' => "Attention à ne pas rester collé !",
                'icon' => 'caulk.png',
                'position' => '2'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "La peinture",
                'slug' => "paint",
                'icon' => 'spray.png',
                'position' => '2'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Les wigs",
                'slug' => "wigs",
                'short_description' => "Un petit brushing ?",
                'icon' => 'wig.png',
                'position' => '2'
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Suggestion d'améliorations pour le site",
                'short_description' => "Des suggestions, des idées pour améliorer le site ?",
                'slug' => str_slug("Suggestion d'améliorations pour le site"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Général')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Proposition de tutoriels",
                'short_description' => "Une idée de tutoriel intéressante ?",
                'slug' => str_slug("Proposition de tutoriels"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Général')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Proposer une vidéos",
                'short_description' => "Vous avez envie de montrer vos tutoriels vidéo et de partager vos connaissances ?",
                'slug' => str_slug("Proposer une vidéos"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Général')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Offre de commissions",
                'short_description' => "Vous cherchez un cosplayeur ?",
                'slug' => str_slug("Offre de commissions"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Général')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Vos cosplays",
                'short_description' => "Vous avez des beaux cosplay à montrer ?",
                'slug' => str_slug("Vos cosplays"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Taverne')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Communauté e-sport",
                'short_description' => "Y'a pas que le cosplay dans la vie ! Y'a les jeux vidéos aussi !",
                'slug' => str_slug("Communauté e-sport"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Taverne')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "Divers",
                'short_description' => "Pour parler de tout et de rien, mais surtout de rien !",
                'slug' => str_slug("Divers"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Taverne')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "La couture, faisons le point",
                'short_description' => "Pour ceux qui ont du mal avec le concept de la couture",
                'slug' => str_slug("La couture, faisons le point"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Trucs & Astuces')->first()->id
            ]
        );

        DB::table('forums')->insert(
            [
                'title' => "L'artisanat",
                'short_description' => "Vous avez du mal à trouver la solution pour votre dernière pièce d'armure ?",
                'slug' => str_slug("L'artisanat"),
                'channel_id' => \App\Forum\Models\Channel::where('name', 'Trucs & Astuces')->first()->id
            ]
        );
    }
}
