<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'course_name'  => $faker->words(3, true), // e.g. "Advanced Database Systems"
        'course_code'  => strtoupper($faker->unique()->bothify('CSE###')),
        'credit_hours' => $faker->numberBetween(2, 5),
        'gpa_scale'    => $faker->randomElement(['0-4', '0-10']),
    ];
});
