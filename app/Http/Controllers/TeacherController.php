<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Schedule;
use App\Http\Requests\TeacherRec;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teacher')->with(['teachers'=> Teacher::all(), 'schedules'=>Schedule::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRec $request)
    {
        $request->validated();

        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->address = $request->address;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save();

        if($request->schedule){

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }
        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRec $request, Teacher $teacher)
    {
        $request->validated();

        $teacher->name = $request->name;
        $teacher->gender = $request->gender;    
        $teacher->address = $request->address;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save();

        if ($request->schedule) {

            $employee->schedules()->detach();

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $employee->schedules()->attach($schedule);
        }
        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\User  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Deleted Successfully');
    }
}
