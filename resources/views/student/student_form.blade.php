@extends('layouts.app')

@section('content')
    <div class="header text-center mb-4">
        <h1 class="display-6 fw-bold text-primary">
            <i class="fas fa-user-graduate me-2"></i>
            {{ isset($student) ? 'Update Student' : 'Add Student' }}
        </h1>
        <p class="lead text-muted">Manage student details easily</p>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <form method="POST" action="{{ isset($student) ? route('updateStudent', $student->id) : route('addStudent') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id ?? '' }}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" class="form-control" name="name"
                               value="{{ old('name', $student->name ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Unique ID</label>
                        <input type="text" class="form-control" name="unique_id"
                               value="{{ old('unique_id', $student->unique_id ?? '') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" name="email"
                               value="{{ old('email', $student->email ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Phone</label>
                        <input type="text" class="form-control" name="phone"
                               value="{{ old('phone', $student->phone ?? '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Course</label>
                    <select class="form-select" name="course_id" required>
                        <option value="">Select Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}"
                                {{ old('course_id', $student->course_id ?? '') == $course->id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-secondary me-2">Reset</button>
                    @if(isset($student))
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Student
                        </button>
                    @else
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Add Student
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('addCourseForm') }}" class="btn btn-outline-primary">
            <i class="fas fa-book me-2"></i> Go to Course Management
        </a>
    </div>

    <style>
        .card {
            border-radius: 15px;
        }

        .form-label {
            font-weight: 500;
            color: #444;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
        }

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 18px;
        }

        .btn-primary:hover {
            background: #3f37c9;
            transform: translateY(-2px);
        }

        .btn-success:hover {
            background: #38a3a5;
            transform: translateY(-2px);
        }
    </style>
@endsection
