<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function addCourseForm(){
        return view('course.course_form');
    }
    public function index()
    {
        // $courses = Course::paginate(10);
        return view('course.index');
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        // dd($request);
            $validate = $request->validate([
            'course_name'  => 'required|string|max:255|unique:courses,course_name',
            'course_code'  => 'required|string|max:50|unique:courses,course_code',
            'credit_hours' => 'required|integer|min:1',
            'gpa_scale'    => 'required|in:0-4,0-10',
        ]);

        if($validate)
        {
                $course = Course::create($request->all());

                return view('student.index')
                    ->with('success', 'Course created successfully.');
            }

}

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'credit_hours' => 'required|integer|min:1',
            'gpa_scale' => 'required|in:0-4,0-10',
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
