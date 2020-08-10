<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'owner_id' => factory('App\User'),
        'color_id' => 1,
        'title' => $faker->sentence(2),
        'description' => $faker->sentence(5),
    ];
});
