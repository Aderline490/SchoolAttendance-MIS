@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('includes.messages')

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3> {{$data[0]}} </h3>
                        <p>Total Students</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="/students" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3> {{$data[1]}} </h3>
                        <p>Total Teachers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-stalker"></i>
                    </div>
                    <a href="/teachers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">

                        <h3> {{$data[2]}} <sup style='font-size: 20px'>%</sup></h3>

                        <p>Students On Time %</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/sattendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box bg-olive">
                    <div class="inner">

                        <h3> {{$data[3]}} <sup style='font-size: 20px'>%</sup></h3>

                        <p>Teachers On Time %</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="/tattendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3> {{$data[2]}} </h3>
                        <p>Students On Time Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    <a href="/sattendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3> {{$data[3]}} </h3>
                        <p>Teachers On Time Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clock"></i>
                    </div>
                    <a href="/tattendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3> {{$data[4]}} </h3>

                        <p>Students Late Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-alert-circled"></i>
                    </div>
                    <a href="/sattendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3> {{$data[5]}} </h3>

                        <p>Teachers Late Today</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-alert-circled"></i>
                    </div>
                    <a href="/tattendance" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Attendance Report</h3>
                    </div>
                    <div class="box-body">
                    <canvas id="myChart" width="400" height="400"> </canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- right col -->

</div>

@include('includes.index_scripts')

@endsection