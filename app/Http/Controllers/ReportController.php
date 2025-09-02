<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;

class ReportController extends Controller
{
     public function index()
    {

        $students = Student::withCount('courses')
            ->having('courses_count', '>', 3)
            ->get();


        $courses = Course::withCount('students')->get();

        return view('report.index', compact('students', 'courses'));
    }
}
