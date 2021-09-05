<?php

namespace App\Http\Controllers;

use DateTime;
use App\Teacher;
use App\Schedule;
use App\TeacherLatetime;
use App\TeacherAttendance;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AttendanceTeach;


class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teacher_attendance')->with(['teacher_attendances'=> TeacherAttendance::all()]);
    }


    /**
     * assign attendance to employee.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assign(AttendanceTeach $request)
    {
        $request->validated();

        if ($teacher = Teacher::whereId(request('id'))->first()){

                    if (!TeacherAttendance::whereAttendance_date(date("Y-m-d"))->whereTeacher_id($employee->id)->first()){
                        $teacher_attendance = new Attendance;
                        $teacher_attendance->teacher_id = $teacher->id;
                        $teacher_attendance->attendance_time = date("H:i:s");
                        $teacher_attendance->attendance_date = date("Y-m-d");

                        $schedules = Schedule::all();
                        if (!($schedules->first()->time_in >= $teacher_attendance->attendance_time)){
                            $attendance->status = 0;
                        TeacherAttendanceController::lateTime($teacher);
                        };
                        $teacher_attendance->save();

                    }else{
                        return redirect()->back()->with('error', 'The attendance has been assigned! ');
                    }
        }
        return redirect()->route('tattendance')->with('success', 'Successful in assign the attendance');
    }

    /**
     * assign late time for attendace .
     *
     * @return \Illuminate\Http\Response
     */
    public static function lateTime(Teacher $teacher)
    {
        $schedules = Schedules::all();
        $current_t= new DateTime(date("H:i:s"));
        $start_t= new DateTime($schedules->first()->time_in);
        $difference = $start_t->diff($current_t)->format('%H:%I:%S');


        $latetime = new TeacherLatetime;
        $latetime->teacher_id = $teacher->id;
        $latetime->duration   = $difference;
        $latetime->latetime_date  = date("Y-m-d");
        $latetime->save();

    }


}
