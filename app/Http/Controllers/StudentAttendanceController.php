<?php

namespace App\Http\Controllers;

use DateTime;
use App\Student;
use App\StudentLatetime;
use App\StudentAttendance;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AttendanceStud;
use Illuminate\Support\Facades\Log;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.student_attendance')->with(['student_attendances'=> StudentAttendance::all()]);
    }

    /**
     * Display a listing of the latetime.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLatetime()
    {
        return view('admin.latetime')->with(['latetimes' => StudentLatetime::all()]);
    }



    /**
     * assign attendance to student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(AttendanceStud $request)
    {
        $request->validated();

        if ($student = Student::whereId(request('id'))->first()){
                    if (!StudentAttendance::whereAttendance_date(date("Y-m-d"))->whereStudent_id($student->id)->first()){
                        $student_attendance = new StudentAttendance;
                        $student_attendance->student_id = $student->id;
                        $student_attendance->attendance_time = date("H:i:s");
                        $student_attendance->attendance_date = date("Y-m-d");

                        if (!($student->schedules->first()->time_in >= $student_attendance->attendance_time)){
                            $student_attendance->status = 0;
                            StudentAttendanceController::lateTime($student);
                        };
                        $student_attendance->save();

                    }else{
                        return redirect()->route('attendance.login')->with('error', 'you assigned your attendance before');
                    }
        }
        return redirect()->route('attendance')->with(['student_attendances'=>$student_attendances]);
    }

    /**
     * assign late time for attendace .
     *
     * @return \Illuminate\Http\Response
     */
    public static function lateTime(Student $student)
    {
        $current_t= new DateTime(date("H:i:s"));
        $start_t= new DateTime($student->schedules->first()->time_in);
        $difference = $start_t->diff($current_t)->format('%H:%I:%S');


        $latetime = new StudentLatetime;
        $latetime->student_id = $student->id;
        $latetime->duration   = $difference;
        $latetime->latetime_date  = date("Y-m-d");
        $latetime->save();

    }


}
