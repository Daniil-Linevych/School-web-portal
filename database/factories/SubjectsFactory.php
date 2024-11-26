<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subjects;

use Faker\Generator as Faker;

$factory->define(Subjects::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(4)
    ];
});
