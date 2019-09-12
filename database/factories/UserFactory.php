<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'email' => $faker->email,
        'password' => $faker->password,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'enabled' => true,
        'is_teacher' => true
    ];
});
