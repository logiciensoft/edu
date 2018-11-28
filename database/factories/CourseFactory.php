<?php

use Faker\Generator as Faker;

$courses = ['Primary', 'Secondary', 'Level 1', 'Level 2', 'Beginner', 'Advanced'];

$factory->define(App\Course::class, function (Faker $faker) use ($courses) {
    return [
        'name' => $courses[array_rand($courses)]
    ];
});
