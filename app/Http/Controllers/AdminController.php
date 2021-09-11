<?php

namespace App\Http\Controllers;
use App\Student;
use App\Teacher;
use App\User;
use App\Admin;
use App\StudentLatetime;
use App\TeacherLatetime;
use App\StudentAttendance;
use App\StudentLeave;
use App\TeacherAttendance;
use App\TeacherLeave;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class AdminController extends Controller
{
    
    /**
     * Display a listing of the attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalStud =  count(Student::all());
        $students = Student::all();
        $totalTeach =  count(Teacher::all());
        $studentAttendance = StudentAttendance::whereAttendance_date(date('m'))->get();
        $studAttendance = count(StudentAttendance::whereAttendance_date(date("Y-m-d"))->get());
        $studLeave = count(StudentLeave::whereLeave_date(date("Y-m-d"))->get());
        $teachAttendance = count(TeacherAttendance::whereAttendance_date(date("Y-m-d"))->get());
        $teachLeave = count(TeacherLeave::whereLeave_date(date("Y-m-d"))->get());
        $ontimeStud = count(StudentAttendance::whereAttendance_date(date("Y-m-d"))->whereStatus('1')->get());
        $ontimeTeach = count(TeacherAttendance::whereAttendance_date(date("Y-m-d"))->whereStatus('1')->get());
        $latetimeStud = count(StudentAttendance::whereAttendance_date(date("Y-m-d"))->whereStatus('0')->get());
        $latetimeTeach = count(TeacherAttendance::whereAttendance_date(date("Y-m-d"))->whereStatus('0')->get());
        if($studAttendance > 0){
        $studentPercentageOntime = str_split(($ontimeStud/ $studAttendance)*100, 4)[0];
        }else {
            $studentPercentageOntime = 0 ;
        }
        if($teachAttendance > 0){
        $teacherPercentageOntime = str_split(($ontimeTeach/ $teachAttendance)*100, 4)[0];
        }else {
            $teacherPercentageOntime = 0 ;
        }
        $data = [$totalStud, $totalTeach, $ontimeStud, $ontimeTeach, $latetimeStud, $latetimeTeach, $studentPercentageOntime, $teacherPercentageOntime, $studLeave, $teachLeave];
        view('includes.index_scripts')->with(['data' => $data]);
        return view('admin.index')->with(['data' => $data]);

    }
    
}
