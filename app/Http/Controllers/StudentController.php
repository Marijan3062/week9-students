<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function show($student_slug)
    {
        $student = \App\Student::where('slug', $student_slug)->first();

        if (!$student) {
            abort(404, 'Student not found');
        }

        $view = view('student/show');
        $view->student = $student;
        return $view;
    }

    public function index()
    {
        $students = Student::orderBy('name', 'asc')->get();

        return view('/student/index', compact('students'));
    }
    public function create()
    {

        return view('student/show', compact('detention'));
    }

    public function store(Request $request) //, $id)
    {
        $detention = new Detention;

        $student = Student::findOrFail(1);

        $detention->fill($request->only([
            'subject',
            'description'
        ]));



        $detention->save();

        session()->flash('success_message', 'Success!');

        return redirect()->route('show', ['student_slug' => $student->name]);
    }
}
