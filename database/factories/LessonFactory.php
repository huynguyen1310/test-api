<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'views' => $faker->numberBetween(1000, 9000),
        'difficulty' => $faker->randomElement(['beginner', 'advanced', 'intermediate'])
    ];
});
