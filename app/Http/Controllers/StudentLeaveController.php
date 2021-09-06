<?php

namespace App\Http\Controllers;

use DateTime;
use App\Student;
use App\StudentLeave;
use App\Http\Requests\LeaveStud;
use Illuminate\Support\Facades\Hash;

class StudentLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.student_leave')->with(['student_leaves' => StudentLeave::all()]);
    }

    /**
     * assign leave to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(LeaveStud $request)
    {
        $request->validated();

        if ($student = Student::whereId(request('id'))->first()) {

                if (!StudentLeave::whereLeave_date(date("Y-m-d"))->whereStudent_id($student->id)->first()) {
                    $student_leave = new StudentLeave;
                    $student_leave->student_id = $student->id;
                    $student_leave->leave_date = $request->leave_date;
                    $student_leave->return_date = $request->return_date;
                    $student_leave->save();
                    return redirect()->route('sleave')->with('success', 'Successful in assigning the leave');
                } else {
                    return redirect()->back()->with('error', 'The leave has been assigned!');
                }
            }
            return redirect()->route('sleave')->with('error', 'Student with such id doesn\'t exist');

    }

}
