<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;
use App\Course;

$factory->define(Student::class, function (Faker $faker) {
     return [
        'name'      => $faker->name,
        'unique_id' => strtoupper($faker->unique()->bothify('STU###')),
        'email'     => $faker->unique()->safeEmail,
        'phone'     => $faker->numerify('##########'), // 10-digit number
        'course_id' => Course::inRandomOrder()->first()->id ?? factory(Course::class),
        'gpa'       => $faker->randomFloat(2, 0, 10), // works for both 0-4 and 0-10 scale
    ];
});
