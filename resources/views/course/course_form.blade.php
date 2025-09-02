@extends('layouts.app')

@section('content')
<div class="course-page">
    <div class="form-wrapper">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-book me-2"></i> Course Management</h1>
            <p>Add a new course to the system</p>
        </div>

        <!-- Course Form -->
        <form id="courseForm" action="{{ route('courseAdded') }}" method="POST">
            @csrf
            <div class="form-section">
                <h5>Course Information</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="courseName" class="form-label required-field">Course Name</label>
                        <input type="text" name="course_name" class="form-control" id="courseName" required>
                    </div>
                    <div class="col-md-6">
                        <label for="courseCode" class="form-label required-field">Course Code</label>
                        <input type="text" class="form-control" name="course_code" id="courseCode" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="creditHours" class="form-label required-field">Credit Hours</label>
                        <input type="number" class="form-control" name="credit_hours" id="creditHours" min="1" max="6" required>
                    </div>
                    <div class="col-md-6">
                        <label for="gpaScale" class="form-label required-field">GPA Scale</label>
                        <select class="form-select" name="gpa_scale" id="gpaScale" required>
                            <option value="">Select GPA Scale</option>
                            <option value="0-4">0-4 Scale</option>
                            <option value="0-10">0-10 Scale</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                <button type="submit" class="btn btn-primary">Add Course</button>
            </div>
        </form>



    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'error',
            title: 'Validation Failed',
            html: `
                <ul style="text-align:left; color:#e74c3c;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `
        });
    });
</script>
@endif

@if (session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ session('success') }}"
        });
    });
</script>
@endif
@endsection

@push('styles')
<style>
    body {
        background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .course-page {
        display: flex;
        justify-content: center;
        padding: 40px 15px;
    }

    .form-wrapper {
        max-width: 850px;
        width: 100%;
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        padding: 35px;
    }

    .header {
        text-align: center;
        margin-bottom: 25px;
    }

    .header h1 {
        color: #2b2d42;
        font-weight: 700;
    }

    .header p {
        color: #6c757d;
        margin-top: 8px;
    }

    .form-section {
        margin-bottom: 20px;
    }

    .form-section h5 {
        color: #0077b6;
        font-weight: 600;
        margin-bottom: 15px;
        border-left: 4px solid #0077b6;
        padding-left: 8px;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 1.5px solid #ced4da;
        transition: 0.3s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0077b6;
        box-shadow: 0 0 0 0.25rem rgba(0,119,182,0.25);
    }

    .btn {
        border-radius: 10px;
        padding: 12px 22px;
        font-weight: 600;
        transition: transform 0.2s ease-in-out;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .page-nav {
        margin-top: 30px;
        text-align: center;
    }
</style>
@endpush
