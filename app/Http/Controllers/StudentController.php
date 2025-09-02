<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use Barryvdh\DomPDF\Facade as PDF;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Validation\Rule;



class StudentController extends Controller
{
    public function addStudentForm()
    {
        $courses = Course::all();
        return view('student.student_form',compact('courses'));
    }
    public function addStudent(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'unique_id' => 'required|string|max:50|unique:students,unique_id',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:10',
        'course_id' => 'required',

        ]);

          $student =  Student::create($validated);

        //   dd($student);
            return view('student.index')->with('success','Student created.');



    }
    public function index(Request $request)
    {
                // dd($request->get('search'));

        $search = $request->get('search');
        $courseId = $request->get('course_id');
        $minGpa = $request->get('gpa_min');
        $maxGpa = $request->get('gpa_max');
        $perPage = $request->get('per_page', 10);

        $students = Student::with('course')
            ->search($search)
            ->courseFilter($courseId)
            ->gpaRange($minGpa, $maxGpa)
            ->paginate($perPage);

        $courses = Course::all();

        return view('student.index', compact('students', 'courses'));
    }

    public function exportPdf(Request $request)
    {
        // dd($request->get('search'));
        $search   = $request->get('search');
        $courseId = $request->get('course_id');
         $minGpa = $request->get('gpa_min');
        $maxGpa = $request->get('gpa_max');


        $students = Student::with('course')
            ->search($search)
            ->courseFilter($courseId)
            ->gpaRange($minGpa, $maxGpa)
            ->get();
        // dd($students);
        $pdf = Pdf::loadView('student.export_pdf', compact('students'));

        return $pdf->download('students.pdf');
    }
    public function exportCsv(Request $request)
    {
        $response = new StreamedResponse(function () use ($request) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Name', 'Unique ID', 'Email', 'Phone', 'Course', 'GPA']);


           $search   = $request->get('search');
        $courseId = $request->get('course_id');
         $minGpa = $request->get('gpa_min');
        $maxGpa = $request->get('gpa_max');


        $students = Student::with('course')
            ->search($search)
            ->courseFilter($courseId)
            ->gpaRange($minGpa, $maxGpa)
            ->get();

            foreach ($students as $student) {
                fputcsv($handle, [
                    $student->name,
                    $student->unique_id,
                    $student->email,
                    $student->phone,
                    $student->course->course_name ?? 'N/A',
                    $student->gpa,
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="students.csv"');

        return $response;
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('student.student_form', compact('student', 'courses'));
    }

    public function update(Request $request , $id)
    {
       $validated = $request->validate([
        'name' => 'required|string|max:255',
        'unique_id' => [
            'required',
            'string',
            'max:50',
            Rule::unique('students', 'unique_id')->ignore($id),
        ],
        'email' => [
            'required',
            'email',
            Rule::unique('students', 'email')->ignore($id),
        ],
        'phone' => 'required|string|max:10',
        'course_id' => 'required',
    ]);
      $courses = Course::all();
        $search = $request->get('search');
        $courseId = $request->get('course_id');
        $minGpa = $request->get('gpa_min');
        $maxGpa = $request->get('gpa_max');
        $perPage = $request->get('per_page', 10);

        $students = Student::with('course')
            ->search($search)
            ->courseFilter($courseId)
            ->gpaRange($minGpa, $maxGpa)
            ->paginate($perPage);
    $student = Student::findOrFail($id);
    $student->update($validated);

  return redirect('/')->with('success', 'Student updated successfully.');    }

    public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/')
           ->with('success', 'Student deleted successfully.');
}


}
