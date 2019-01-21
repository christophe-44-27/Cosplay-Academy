<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\CommissionQuotation;
use Carbon\Carbon;

class CommissionQuotationsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        CommissionQuotation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('commission_quotations')->insert(
            [
                'description' => "<p>Ton projet m'intéresse tellement ! Je veux en être ! Regardes ce que je peux faire. Je fais des trucs super cools, choisis moi ! :D</p>",
                'price' => 150,
                'estimated_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'commission_id' => \App\Models\Commission::where('id', 1)->first()->id
            ]
        );

        DB::table('commission_quotations')->insert(
            [
                'description' => "<p>Ton projet m'intéresse tellement ! Je veux en être ! Regardes ce que je peux faire. Je fais des trucs super cools, choisis moi ! :D</p>",
                'price' => 10,
                'estimated_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'commission_id' => \App\Models\Commission::where('id', 1)->first()->id
            ]
        );

        DB::table('commission_quotations')->insert(
            [
                'description' => "<p>Ton projet m'intéresse tellement ! Je veux en être ! Regardes ce que je peux faire. Je fais des trucs super cools, choisis moi ! :D</p>",
                'price' => 75,
                'estimated_delivery_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_id' => User::where('email', "email@email.ca")->first()->id,
                'commission_id' => \App\Models\Commission::where('id', 1)->first()->id
            ]
        );
    }
}
