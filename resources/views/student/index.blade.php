@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gpa-badge {
            font-size: 0.85em;
        }
        .action-buttons .btn-group {
            width: 120px;
        }
        .table th {
            border-top: none;
            font-weight: 600;
        }
        .card-header {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1><i class="fas fa-users"></i> Students Management</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{route('addStudentForm')}}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Add New Student
                </a>
                <a href="{{route('addCourseForm')}}" class="btn btn-info">
                    <i class="fas fa-book"></i> Manage Courses
                </a>
            </div>
        </div>

        <!-- Search and Filter Card -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <i class="fas fa-search"></i> Search & Filter Students
            </div>
            <div class="card-body">
                <form method="GET" action="#">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Search by name, email, ID..." value="">
                        </div>
                        <div class="col-md-2">
                            <select name="course_id" class="form-control">
                                <option value="">All Courses</option>
                                @foreach($courses as $course )

                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="gpa_min" class="form-control" placeholder="Min GPA" step="0.01" min="0" value="">
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="gpa_max" class="form-control" placeholder="Max GPA" step="0.01" min="0" value="">
                        </div>
                        <div class="col-md-2">
                            <select name="per_page" class="form-control">
                                <option value="10" selected>10 per page</option>
                                <option value="25">25 per page</option>
                                <option value="50">50 per page</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Export Buttons -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="btn-group">
       <a href="{{ route('students.export.csv') }}?{{ request()->getQueryString() }}" class="btn btn-success">
        <i class="fas fa-file-csv"></i> Export CSV
    </a>
   <a href="{{ route('students.export.pdf') }}?{{ request()->getQueryString() }}" class="btn btn-danger">
        <i class="fas fa-file-pdf"></i> Export PDF
    </a>


                </div>
            </div>
        </div>
{{-- {{dd($students)}} --}}
        <!-- Students Table -->
        <div class="card">
            <div class="card-header bg-dark text-white">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Unique ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Course</th>
                                <th>GPA</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td><code>{{$student->unique_id}}</code></td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone}}</td>
                                <td>
                                    <span class="badge bg-info">{{$student->course->course_name}}</span>
                                </td>
                                <td>
                                    <span class="badge bg-success gpa-badge">
                                        {{$student->gpa}}
                                    </span>
                                </td>
                                <td class="action-buttons">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('student.delete', $student->id) }}"   onsubmit="return confirm('Are you sure you want to delete this student?')">
                                            <button type="submit" class="btn btn-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
    </div>
    <div>
        {{ $students->withQueryString()->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
