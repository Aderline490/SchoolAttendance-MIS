@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Teacher Attendance
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teacher Attendance</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addteacherattendance" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Teacher ID</th>
                                <th>Name</th>
                                <th>Attendance</th>
                            </thead>
                            <tbody>
                                @foreach( $teacher_attendances as $teacher_attendance)

                                <tr>
                                    <td>{{$teacher_attendance->attendance_date}}</td>
                                    <td>{{$teacher_attendance->teacher_id}}</td>
                                    <td>{{$teacher_attendance->teacher->name}}</td>
                                    <td>{{$teacher_attendance->attendance_time}}
                                        @if( $teacher_attendance->status == 1 )
                                        <span class="label label-success pull-right">On Time</span>
                                        @elseif( $teacher_attendance->status == 0 )
                                        <span class="label label-danger pull-right">Late</span>
                                        @else
                                        <span class="label label-warning pull-right">Absent</span>
                                        @endif
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
@include('includes.add_teacher_attendance')
@endsection
