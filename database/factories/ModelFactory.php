<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Forum::class, function(Faker $faker) {
    return [
        'title' => $faker->sentence,
        'short_description' => $faker->sentence
    ];
});

$factory->define(App\Models\ForumTopic::class, function(Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'content' => $faker->paragraph,
        'slug' => str_slug($title),
        'user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        },
        'forum_id' => function() {
            return factory(App\Models\Forum::class)->create()->id;
        }
    ];
});

$factory->define(App\Models\ForumTopicAnswer::class, function(Faker $faker) {

    return [
        'content' => $faker->paragraph,
        'user_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        },
        'forum_topic_id' => function() {
            return factory(App\Models\ForumTopic::class)->create()->id;
        }
    ];
});
