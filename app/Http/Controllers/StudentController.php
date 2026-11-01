<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $query = Student::with('department');

    if ($request->filled('search')) {
        $query->where('student_name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('dept_id')) {
        $query->where('dept_id', $request->dept_id);
    }

    // Order by ID ascending (1, 2, 3, 4...)
    $students = $query->orderBy('student_id', 'asc')->paginate(10);
    $departments = Department::all();

    return view('students.liststudent', compact('students', 'departments'));
}

    public function create()
    {
        $departments = Department::all();
        return view('students.addstudent', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'     => 'required|string|max:255',
            'gender'           => 'required|in:Male,Female,Other',
            'dob'              => 'required|date',
            'enrollment'       => 'nullable|string|max:50',
            'enrollment_date'  => 'nullable|date',
            'description'      => 'nullable|string',
            'dept_id'          => 'required|exists:departments,dept_id',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        $student->load('department');
        return view('students.deletestudent', compact('student'));
    }

    public function edit(Student $student)
    {
        $departments = Department::all();
        return view('students.editstudent', compact('student', 'departments'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_name'     => 'required|string|max:255',
            'gender'           => 'required|in:Male,Female,Other',
            'dob'              => 'required|date',
            'enrollment'       => 'nullable|string|max:50',
            'enrollment_date'  => 'nullable|date',
            'description'      => 'nullable|string',
            'dept_id'          => 'required|exists:departments,dept_id',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }
}