@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Student List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Student</li>
            <li class="active">Student List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnewstudent" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>&numero;</th>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Address</th>
                                <th>Tools</th>
                            </thead>
                                
                            <tbody>
                                @foreach( $students as $student)
                                    <tr>
                                        <td><a href="/sattendance">{{$student->id}}</a></td>
                                        <td><a href="/sattendance">{{$student->student_id}}</a></td>
                                        <td><a href="/sattendance">{{$student->name}}</a></td>
                                        <td><a href="/sattendance">{{$student->class}}</a></td>
                                        <td><a href="/sattendance">{{$student->section}}</a></td>
                                        <td><a href="/sattendance">{{$student->address}}</a></td>
                                        <td>
                                            <a href="#edit{{$student->name}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                            <a href="#delete{{$student->name}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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
@foreach( $students as $student)
@include('includes.edit_delete_student')
@endforeach

@include('includes.add_student')

@endsection