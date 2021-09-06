<?php

namespace App\Http\Controllers;

use DateTime;
use App\Teacher;
use App\TeacherLeave;
use App\Http\Requests\LeaveTeach;
use Illuminate\Support\Facades\Hash;

class TeacherLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teacher_leave')->with(['teacher_leaves' => TeacherLeave::all()]);
    }

    /**
     * assign leave to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(LeaveTeach $request)
    {
        $request->validated();

        if ($teacher = Teacher::whereId(request('id'))->first()) {

                if (!TeacherLeave::whereLeave_date(date("Y-m-d"))->whereTeacher_id($teacher->id)->first()) {
                    $teacher_leave = new TeacherLeave;
                    $teacher_leave->teacher_id = $teacher->id;
                    $teacher_leave->leave_date = $request->leave_date;
                    $teacher_leave->return_date = $request->return_date;
                    $teacher_leave->save();
                return redirect()->route('tleave')->with('success', 'Successful in assigning the leave');
            } else {
                return redirect()->back()->with('error', 'The leave has been assigned!');
            }
        }
        return redirect()->route('tleave')->with('error', 'Teacher with such id doesn\'t exist');
    }

}
