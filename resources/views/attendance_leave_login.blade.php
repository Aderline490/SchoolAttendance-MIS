<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'School Attendance System') }}</title>


    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        .mt20 {
            margin-top: 20px;
        }

        .bold {
            font-weight: bold;
        }

        /* chart style*/
        #legend ul {
            list-style: none;
        }

        #legend ul li {
            display: inline;
            padding-left: 30px;
            position: relative;
            margin-bottom: 4px;
            border-radius: 5px;
            padding: 2px 8px 2px 28px;
            font-size: 14px;
            cursor: default;
            -webkit-transition: background-color 200ms ease-in-out;
            -moz-transition: background-color 200ms ease-in-out;
            -o-transition: background-color 200ms ease-in-out;
            transition: background-color 200ms ease-in-out;
        }

        #legend li span {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 100%;
            border-radius: 5px;
        }
    </style>

    @yield('style')

</head>


<body class="hold-transition login-page">
    <div class="login-box">

        @if(\Route::currentRouteName() == 'attendance.login' )

            <div class="login-logo">
                <b>Attendance Login</b>
            </div>

            <div class="login-box-body">
                <p class="login-box-msg">Sign in to assign your Attendance</p>

        @include('includes.messages')

            <form class="form-horizontal" method="POST" action="{{ route('attendance.assign') }}">

        @else

                <div class="login-logo">
                    <b>Leave Login</b>
                </div>

                <div class="login-box-body">
                    <p class="login-box-msg">Sign in to assign your Leave</p>

        @include('includes.messages')

                    <form class="form-horizontal" method="POST" action="#">

        @endif



                        @csrf
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" name="email" placeholder="input Your E-mail" required autofocus>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="pin_code" placeholder="input Your Pin Code ( 4 Digits )" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-4"></div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>



        </div>

        @include('includes.scripts')


</body>

</html>
