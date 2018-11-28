<?php

use Faker\Generator as Faker;

$subjects = ['English', 'Mathematics', 'Science', 'Social Studies', 'Swahili'];

$factory->define(App\Subject::class, function (Faker $faker) use ($subjects) {
    return [
        'name' => $subjects[array_rand($subjects)]
    ];
});
