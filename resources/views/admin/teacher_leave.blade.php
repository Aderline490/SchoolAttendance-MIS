@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Teacher Leave
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Teacher Leave</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addteacherleave" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>Date</th>
                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Leave Date</th>
                                <th>Return Date</th>
                            </thead>
                            <tbody>
                                @foreach( $teacher_leaves as $teacher_leave)
                                <tr>
                                    <td>{{$teacher_leave->leave_date}}</td>
                                    <td>{{$teacher_leave->teacher_id}}</td>
                                    <td>{{$teacher_leave->teacher->name}}</td>
                                    <td>{{$teacher_leave->leave_date}}</td>
                                    <td>{{$teacher_leave->return_date}}</td>
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
@include('includes.add_teacher_leave')
@endsection
