@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            teacher List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>teachers</li>
            <li class="active">teacher List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>teacher ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Schedule</th>
                                <th>Member Since</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach( $teachers as $teacher)

                                <tr>
                                    <td>{{$teacher->id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>
                                        @if(isset($teacher->schedules->first()->slug))
                                        {{$teacher->schedules->first()->slug}}
                                        @endif
                                    </td>
                                    <td>{{$teacher->created_at}}</td>
                                    <td>

                                        <a href="#edit{{$teacher->name}}" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#delete{{$teacher->name}}" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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
@foreach( $teachers as $teacher)
@include('includes.edit_delete_teacher')
@endforeach

@include('includes.add_student')

@endsection
