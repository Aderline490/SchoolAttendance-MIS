<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Schedule;
use App\Teacher;
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

        $teacher = new User;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->pin_code = bcrypt($request->pin_code);
        $teacher->save();

        if($request->schedule){

            $schedule = Schedule::whereSlug($request->schedule)->first();

            $teacher->schedules()->attach($schedule);
        }

        $role = Role::whereSlug('emp')->first();

        $teacher->roles()->attach($role);



        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\User  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRec $request, User $teacher)
    {
        $request->validated();

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->pin_code = bcrypt($request->pin_code);
        $teacher->save();

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
    public function destroy(User $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher Has Been Deleted Successfully');
    }
}
