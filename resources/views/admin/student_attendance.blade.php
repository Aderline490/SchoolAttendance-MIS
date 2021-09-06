@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Attendance</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header with-border">
                        <a href="#addstudentattendance" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Attendance</th>
                            </thead>
                            <tbody>
                                @foreach( $student_attendances as $student_attendance)
                                <tr>
                                    <td>{{$student_attendance->attendance_date}}</td>
                                    <td>{{$student_attendance->student_id}}</td>
                                    <td>{{$student_attendance->student->name}}</td>
                                    <td>{{$student_attendance->student->class}}</td>
                                    <td>{{$student_attendance->student->section}}</td>
                                    <td>{{$student_attendance->attendance_time}}
                                        @if( $student_attendance->status == 1 )
                                        <span class="label label-success pull-right">On Time</span>
                                        @elseif( $student_attendance->status == 0 )
                                        <span class="label label-danger pull-right">Late</span>
                                        @else
                                        <span class="label label-warning pull-right">Absent</span>
                                        @endif
                                    </td>
                                    <td>
                                            <a href="#editstudentatt" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                            <a href="#deletestudentatt" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
                                        </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('includes.add_student_attendance')
@endsection
