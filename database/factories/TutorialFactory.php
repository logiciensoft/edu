<?php

use Faker\Generator as Faker;

$factory->define(App\Tutorial::class, function (Faker $faker) {
    return [
        'content' => implode("\n", $faker->sentences)
    ];
});
