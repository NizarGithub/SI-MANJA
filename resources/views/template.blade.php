<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('/')}}assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{URL::to('/')}}assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{URL::to('/')}}/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{URL::to('/')}}/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{URL::to('/')}}/assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!-- include summernote css/js-->
    <link href="{{URL::to('/')}}/assets/css/summernote.css" rel="stylesheet">



    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{URL::to('/')}}/assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{URL::to('/')}}/assets/css/themify-icons.css" rel="stylesheet">
    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#7a9e9f;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            z-index: 9999;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:22px;
        }

        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .inputfile + label {
            font-size: 1.25em;
            font-weight: 700;
            color: white;
            background-color: #68B3C8;
            display: inline-block;
        }

        .inputfile:focus + label,
        .inputfile + label:hover {
            background-color: #3091B2;
        }

        .inputfile + label {
            cursor: pointer; /* "hand" cursor */
            padding:10px;
        }

        .inputfile:focus + label {
            outline: 1px dotted #000;
            outline: -webkit-focus-ring-color auto 5px;
        }
    </style>
    @section('css')
    @show

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo" style="border: none">
                <a href="" class="simple-text" style="font-size: 8pt">
                    Sistem Informasi Manajemen Jadwal
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{URL::to('/')}}">
                        <i class="ti-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                    @if(auth()->user()->role == \App\User::ROLE_MANAGER)
                    <li>
                    <a href="{{URL::to('user')}}">
                        <i class="ti-user"></i>
                        <p>Data Pengguna</p>
                    </a>
                        </li>
                <li>
                    <a href="{{URL::to('kecamatan')}}">
                        <i class="ti-folder"></i>
                        <p>Data Kecamatan</p>
                    </a>
                    </li>
                    @endif
                <li>
                        <a href="{{URL::to('change_password')}}">
                            <i class="ti-lock"></i>
                            <p>Ubah Password</p>
                        </a>
                    </li>
                        <li>
                    <a href="{{URL::to('logout')}}">
                        <i class="fa fa-sign-out"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">SI MANJA</a>
                </div>
                <div class="collapse navbar-collapse">
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<li>--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                {{--<i class="ti-panel"></i>--}}
                                {{--<p>Stats</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                {{--<i class="ti-bell"></i>--}}
                                {{--<p class="notification">5</p>--}}
                                {{--<p>Notifications</p>--}}
                                {{--<b class="caret"></b>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">Notification 1</a></li>--}}
                                {{--<li><a href="#">Notification 2</a></li>--}}
                                {{--<li><a href="#">Notification 3</a></li>--}}
                                {{--<li><a href="#">Notification 4</a></li>--}}
                                {{--<li><a href="#">Another notification</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<i class="ti-settings"></i>--}}
                                {{--<p>Settings</p>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">

                {{--<div class="row">--}}

                    {{--<div class="col-md-12">--}}
                        {{--<div class="card">--}}
                            {{--<div class="header">--}}
                                {{--<h4 class="title">Users Behavior</h4>--}}
                                {{--<p class="category">24 Hours performance</p>--}}
                            {{--</div>--}}
                            {{--<div class="content">--}}
                                {{--<div id="chartHours" class="ct-chart"></div>--}}
                                {{--<div class="footer">--}}
                                    {{--<div class="chart-legend">--}}
                                        {{--<i class="fa fa-circle text-info"></i> Open--}}
                                        {{--<i class="fa fa-circle text-danger"></i> Click--}}
                                        {{--<i class="fa fa-circle text-warning"></i> Click Second Time--}}
                                    {{--</div>--}}
                                    {{--<hr>--}}
                                    {{--<div class="stats">--}}
                                        {{--<i class="ti-reload"></i> Updated 3 minutes ago--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                @yield('content')

        </div>


        <footer class="footer">
            <div class="container-fluid">
                {{--<nav class="pull-left">--}}
                    {{--<ul>--}}

                        {{--<li>--}}
                            {{--<a href="http://www.creative-tim.com">--}}
                                {{--Creative Tim--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="http://blog.creative-tim.com">--}}
                                {{--Blog--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="http://www.creative-tim.com/license">--}}
                                {{--Licenses--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Eny Lsitriany</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

<!--   Core JS Files   -->

<script src="{{URL::to('/')}}/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
{{--<script src="{{URL::to('/')}}/assets/js/bootstrap-checkbox-radio.js"></script>--}}

<!--  Charts Plugin -->
<script src="{{URL::to('/')}}/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="{{URL::to('/')}}/assets/js/bootstrap-notify.js"></script>


<script src="{{URL::to('/')}}/assets/js/summernote.min.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="{{URL::to('/')}}/assets/js/paper-dashboard.js"></script>


<script type="text/javascript">

    @if (session('status_success'))
    $.notify({
        icon: 'ti-check',
        message: " {{ session('status_success') }}"

    },{
        type: 'success',
        timer: 4000
    });
    @endif

    @if (session('status_fail'))
    $.notify({
        icon: 'ti-alert',
        message: " {{ session('status_fail') }}"

    },{
        type: 'danger',
        timer: 4000
    });
    @endif
</script>

@section('js')
@show

</html>
