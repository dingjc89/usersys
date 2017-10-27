<!DOCTYPE html>
<html>

<head>

    <title>后台登入</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=4.1.0')}}" rel="stylesheet">


</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        {{--<div>--}}

            {{--<h1 class="logo-name">new</h1>--}}

        {{--</div>--}}
        {{--<h3>欢迎使用 NEW</h3>--}}

        <div class="form-group">
            <input class="form-control" id="username" name="username" placeholder="用户名" type="text" value="" />
        </div>
        <div class="form-group">
            <input class="form-control" id="passwd" name="passwd" placeholder="密码" type="password" value="" />
        </div>
        <button class="btn btn-primary block full-width m-b" name="button">登 录</button>
    </div>
</div>



</body>
<!-- 全局js -->
<script src="js/jquery.min.js?v=2.1.4"></script>
<script src="js/bootstrap.min.js?v=3.3.6"></script>
</html>