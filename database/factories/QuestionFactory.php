<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'responses' => json_encode($faker->words),
        'quiz_id' => function() {
            return factory(\App\Quiz::class)->create()->id;
        }
    ];
});
