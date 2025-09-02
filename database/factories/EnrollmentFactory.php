<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Model;
use Faker\Generator as Faker;
use App\Student;
use App\Course;
use App\Enrollment;
$factory->define(Enrollment::class, function (Faker $faker) {
    return [
        'student_id' => Student::factory(),
        'course_id' => Course::factory(),
    ];
});
