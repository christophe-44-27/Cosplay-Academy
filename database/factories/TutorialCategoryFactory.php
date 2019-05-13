<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TutorialCategory;
use Faker\Generator as Faker;

$factory->define(TutorialCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'filter_value' => $faker->slug,
    ];
});
