<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Schedule;
use App\Http\Requests\TeacherRec;
use Illuminate\Support\Facades\DB;

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
    public function store(TeacherRec $request, Teacher $teacher)
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

            $teacher->schedules()->attach($schedule);
        }
        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRec $request, $id)
    {
        $request->validated();
        
        $teacher = Teacher::find($id);

        $teacher->name = $request->name;
        $teacher->gender = $request->gender;    
        $teacher->address = $request->address;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->update();


        if ($request->schedule) {

            $teacher->schedules()->detach();

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $teacher->schedules()->attach($schedule);
        }
        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $teacher->delete();
        DB::delete('DELETE FROM teachers where id = ?',[$id]);

        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Deleted Successfully');
    }
}
