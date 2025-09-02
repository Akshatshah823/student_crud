@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Database Query Optimization Report</h2>

    {{-- Students with > 3 courses --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Students Enrolled in More Than 3 Courses
        </div>
        <div class="card-body">
            @if($students->isEmpty())
                <p>No students found.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Total Courses</th>
                            <th>Enrolled Courses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->courses_count }}</td>
                                <td>
                                    <ul>
                                        @foreach($student->courses as $course)
                                            <li>{{ $course->course_name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    {{-- Course-wise student count --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            Total Students Enrolled per Course
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Students Enrolled</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->students_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Back to Home --}}
    <div class="text-center">
        <a href="{{ url('/') }}" class="btn btn-outline-primary">
            ⬅ Back to Home
        </a>
    </div>
</div>
@endsection
