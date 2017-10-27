
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>管理后台 - 首页</title>
    @include('admin.layout.header')
</head>

<body class="gray-bg top-navigation" style="overflow: hidden">
{{--加载--}}
<div class="fideLoading hide" style="position: fixed; width: 100%; height: 100%; top: 0px; left: 0px; z-index: 9999;">
    <div class="sk-spinner sk-spinner-wave" style="position: absolute;top: 50%;left: 50%;">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
{{--end 加载--}}
<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg" style="position: absolute;width: 100%;z-index: 1000;">
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-header">
                    <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <i class="fa fa-reorder"></i>
                    </button>
                    <a href="#" class="navbar-brand">Hplus</a>
                </div>
            @include('admin.layout.menu')
            </nav>
        </div>
        @include('admin.layout.content')
        <div class="footer fixed_full">
            <div class="pull-right">
                By：<a href="http://www.zi-han.net" target="_blank">steve's blog</a>
            </div>
            <div>
                <strong>Copyright</strong> steve &copy; 2017
            </div>
        </div>

    </div>
</div>
</body>
@include('admin.layout.footer')
@section('footer')
@show
</html>
