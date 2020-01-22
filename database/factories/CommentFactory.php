<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = factory(User::class)->create();
    return [
        "body" => $faker->paragraph,
        "user_id" => '1',
        "created_by" => 'admin',

    ];
});
