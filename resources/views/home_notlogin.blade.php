<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body style="background: #f4f3ef;">


<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6 col-xs-12 ">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Login</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content">
                        <form class="" method="post" action="{{URL::to('login')}}">
                            @if($errors->any())
                                <p class="text-danger">{{$errors->first()}}</p>
                            @endif
                                @if(session('message'))
                                    <p class="text-info">{{session('message')}}</p>
                                @endif
                            <div class="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name='username' class="form-control border-input" placeholder="username" >
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control border-input" placeholder="password" >
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info btn-fill btn-wd" value="masuk" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 ">
                <div class="card" style="height: 285px;">
                <div class="text-center" style="padding-top: 100px">
                    Untuk pembuatan akun harap menghubungi <br>admin atau petugas yang bertanggung jawab
                </div>
                    </div>
            </div>
        </div>

    </div>
</div>



</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>



<script type="text/javascript">

</script>

</html>
