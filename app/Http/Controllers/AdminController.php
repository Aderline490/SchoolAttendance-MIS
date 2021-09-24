<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Student;
use App\Teacher;
use App\StudentLatetime;
use App\TeacherLatetime;
use App\StudentAttendance;
use App\StudentLeave;
use App\TeacherAttendance;
use App\TeacherLeave;
use App\Http\Requests\UserRec;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

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
        $studLeave = count(StudentLeave::all());
        $teachAttendance = count(TeacherAttendance::whereAttendance_date(date("Y-m-d"))->get());
        $teachLeave = count(TeacherLeave::all());
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
        return view('admin.index')->with(['data' => $data]);

    }

    public function update(UserRec $request, User $user)
    {
        $request->validated();

        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->curr_password);
        $user->update();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    
}
