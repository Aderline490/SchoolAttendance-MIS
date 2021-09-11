<?php

namespace App\Http\Controllers;

use App\Student;
use App\Schedule;
use App\Http\Requests\StudentRec;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.student')->with(['students'=> Student::all(), 'schedules'=>Schedule::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRec $request)
    {
        
        $request->validated();

        $student = new Student;
        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->save();
        
        if($request->schedule){

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $student->schedules()->attach($schedule);
        }
        return redirect()->route('students.index')->with('success', 'Student Has Been Registered Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\User  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRec $request, Student $student)
    {
        $request->validated();

        $student->name = $request->name;
        $student->gender = $request->gender;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->save();
        
        if ($request->schedule) {

            $student->schedules()->detach();

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $student->schedules()->attach($schedule);
        }
        
        return redirect()->route('students.index')->with('success', 'Student Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\User  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student Has Been Deleted Successfully');
    }
}
