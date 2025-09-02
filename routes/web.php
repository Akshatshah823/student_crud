<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\ReportController;




Route::get('/', [StudentController::class, 'index'])->name('index');


Route::get('student/add', [StudentController::class, 'addStudentForm'])->name('addStudentForm');
Route::post('student/added', [StudentController::class, 'addStudent'])->name('addStudent');
Route::get('/students/export/pdf', [StudentController::class, 'exportPdf'])->name('students.export.pdf');
Route::get('/students/export/csv', [StudentController::class, 'exportCsv'])->name('students.export.csv');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('updateStudent');
Route::get('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

Route::get('/add/course', [CourseController::class, 'addCourseForm'])->name('addCourseForm');
Route::get('/courses', [CourseController::class, 'index'])->name('courseIndex');
Route::post('/course/added', [CourseController::class, 'store'])->name('courseAdded');

Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
