<div class="ibox-title">
    <h5>角色 <small>分类，查找</small></h5>
    <div class="ibox-tools">
        <a class="collapse-link">
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
        </a>
    </div>
</div>
<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        <table class="table table-striped table-bordered table-hover dataTables-example dataTable">
            <thead>
            <tr role="row">
                <th tabindex="0"  rowspan="1" colspan="1">角色</th>
                <th tabindex="0"  rowspan="1" colspan="1">成员</th>
                <th tabindex="0"  rowspan="1" colspan="1">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $role)
                <tr class="gradeA odd">
                    <td style="padding-left:{{strlen($role->path)*8}}px">{{$role->name}}</td>
                    <td>
                        @foreach($role->users as $user)
                            <span class="btn-primary btn-circle">{{$user->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        <i class="fa fa-plus"></i><a href="{{url('admin/role/add'.'/'.$role->role_id)}}">添加</a>&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-edit"></i><a href="{{url('admin/role/edit').'/'.$role->role_id}}">编辑</a>&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-minus"></i><a href="{{url('admin/role/del')}}" class="del" rowId="{{$role->role_id}}">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
<script>
    $(function(){
        $('.del').on('click',function(e){
            e.preventDefault();
            var _url = $(this).attr('href'),role_id = $(this).attr('rowId'),$tr = $(this).parents('tr');
            $.post(_url,{'id':role_id},function(res){
                if (res.status == 'succ') {
                    layer.alert(res.data,function(index){
                        layer.close(index);
                        $tr.remove();
                    });
                } else {
                    layer.alert(res.data);
                }
            });
        });
    });
</script>