@extends('layouts.main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Teacher List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Teachers</li>
            <li class="active">Teacher List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="#addnewteacher" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                           <thead>
                                <th>Teacher ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                                @foreach( $teachers as $teacher)

                                <tr>
                                    <td>{{$teacher->id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->address}}</td>
                                    <td>{{$teacher->dob}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>{{$teacher->email}}</td>
                                    <td>
                                        <a href="#editteacher" data-toggle="modal" class="btn btn-success btn-sm edit btn-flat"><i class='fa fa-edit'></i> Edit</a>
                                        <a href="#deleteteacher" data-toggle="modal" class="btn btn-danger btn-sm delete btn-flat"><i class='fa fa-trash'></i> Delete</a>
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

@include('includes.add_teacher')

@endsection
