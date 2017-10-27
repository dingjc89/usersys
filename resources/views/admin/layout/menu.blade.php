<div class="navbar-collapse collapse" id="navbar">
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 用户管理 <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="{{url('admin/user')}}">用户列表</a>
                </li>
                <li><a href="{{url('admin/user/add')}}">新增用户</a>
                </li>
                <li><a href="{{url('admin/role')}}">角色列表</a>
                </li>
                <li><a href="{{url('admin/role/add')}}">新增角色</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 模块管理 <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="{{url('admin/menu')}}">栏目管理</a>
                </li>
                <li><a href="{{url('admin/menu/add')}}">新增栏目</a>
                </li>
                <li><a href="">文章管理</a>
                </li>
                <li><a href="">附件管理</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 插件管理 <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="">广告投放</a>
                </li>
                {{--<li><a href="">菜单列表</a>
                </li>
                <li><a href="">菜单列表</a>
                </li>
                <li><a href="">菜单列表</a>
                </li>--}}
            </ul>
        </li>
        {{--<li class="dropdown">
            <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> 菜单 <span class="caret"></span></a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="">菜单列表</a>
                </li>
                <li><a href="">菜单列表</a>
                </li>
                <li><a href="">菜单列表</a>
                </li>
                <li><a href="">菜单列表</a>
                </li>
            </ul>
        </li>--}}

    </ul>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="login.html">
                <i class="fa fa-sign-out"></i> 退出
            </a>
        </li>
    </ul>
</div>