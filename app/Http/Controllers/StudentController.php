<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        $majors = Major::all();
        return view('student.index', [
            'students' => $students,
            'majors' => $majors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')
            ],
            'major_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ]);
        }

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'major_id' => $request->major_id
        ]);

        if($student) {
            return response()->json([
                'status' => 'success',
                'data' => $student
            ]); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json([
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->fill($request->except(['_method', '_token']));
        
        // Jika tidak ada perubahan
        if(!$student->isDirty()) {
            return response()->json([
                'status' => 'error',
                'alert_html' => '<i class="fa-solid fa-circle-xmark me-1"></i> You don\'t change anything'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id)
            ], 
            'major_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'validation_errors' => $validator->errors()
            ]);
        } else {
            $student->save();
            return response()->json([
                'status' => 'success',
                'alert_html' => '<i class="fa-solid fa-circle-info me-1"></i> Student change saved'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
