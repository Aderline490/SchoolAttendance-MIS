@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student Leave
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Leave</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addstudentleave" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Leave Date</th>
                                <th>Return Date</th>
                            </thead>
                            <tbody>
                                @foreach( $student_leaves as $student_leave)
                                <tr>
                                    <td>{{$student_leave->leave_date}}</td>
                                    <td>{{$student_leave->student_id}}</td>
                                    <td>{{$student_leave->student->name}}</td>
                                    <td>{{$student_leave->student->class}}</td>
                                    <td>{{$student_leave->student->section}}</td>
                                    <td>{{$student_leave->leave_date}}</td>
                                    <td>{{$student_leave->return_date}}</td>
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
@include('includes.add_student_leave')
@endsection
