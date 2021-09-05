<?php

namespace App\Http\Controllers;
use App\Student;
use App\Teacher;
use App\Admin;
use App\StudentLatetime;
use App\TeacherLatetime;
use App\StudentAttendance;
use App\TeacherAttendance;
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
        $totalTeach =  count(Teacher::all());
        $studAttendance = count(StudentAttendance::whereAttendance_date(date("Y-m-d"))->get());
        $teachAttendance = count(TeacherAttendance::whereAttendance_date(date("Y-m-d"))->get());
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
        $teacherPercentageOntime = str_split(($ontimeteach/ $teachAttendance)*100, 4)[0];
        }else {
            $teacherPercentageOntime = 0 ;
        }
        
        $data = [$totalStud,$totalTeach, $ontimeStud, $ontimeTeach, $latetimeStud, $latetimeTeach, $studentPercentageOntime, $teacherPercentageOntime];
        return view('admin.index')->with(['data' => $data]);
    }

}