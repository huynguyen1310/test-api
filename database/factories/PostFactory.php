<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'body' => $faker->paragraph(),
        'user_id' => '1',
        'created_by' => 'admin',
    ];
});
