<div class="ibox-title">
    <h5>栏目 <small>添加</small></h5>
    <div class="ibox-tools">
        {{--<a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
            <i class="fa fa-wrench"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="table_data_tables.html#">选项1</a>
            </li>
            <li><a href="table_data_tables.html#">选项2</a>
            </li>
        </ul>
        <a class="close-link">
            <i class="fa fa-times"></i>
        </a>--}}
    </div>
</div>
<div class="ibox-content">
    <form method="get" class="form-horizontal" action="{{url('admin/menu/store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">栏目：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="order">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">显示：</label>
            <div class="col-sm-10">
                <input type="checkbox" class="form-control" name="isdisplay" checked>
            </div>
        </div>

        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit">保存内容</button>
                <button class="btn btn-white" type="submit">取消</button>
            </div>
        </div>
    </form>
</div>