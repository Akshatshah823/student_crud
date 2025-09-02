<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Student;
use App\Enrollment;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Create 15 courses

       $courses = factory(Course::class, 15)->create();
       $students = factory(Student::class, 15)->create();




        $students->each(function ($student) use ($courses) {
            $randomCourses = $courses->random(rand(1, 5))->pluck('id')->toArray();
            $student->courses()->attach($randomCourses);
        });
    }
}
