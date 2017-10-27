<div class="ibox-title">
    <h5>用户 <small>分类，查找</small></h5>
    {{--<div class="ibox-tools">
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
    </div>--}}
</div>
<div class="ibox-content">
    <div class="dataTables_wrapper form-inline">
        {{--查询条件--}}
        <div class="row">
            <div class="col-sm-12">
                <div class="dataTables_filter">
                    <label>查找：
                        <input type="search" class="form-control input-sm" >
                    </label>
                </div>
            </div>
        </div>
        {{--end 查询条件--}}
        <table class="table table-striped table-bordered table-hover dataTables-example dataTable">
            <thead>
            <tr role="row">
                <th tabindex="0"  rowspan="1" colspan="1">用户</th>
                <th tabindex="0"  rowspan="1" colspan="1">性别</th>
                <th tabindex="0"  rowspan="1" colspan="1">email</th>
                <th tabindex="0"  rowspan="1" colspan="1">地址</th>
                <th tabindex="0"  rowspan="1" colspan="1">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $user)
            <tr class="gradeA odd">
                <td>{{$user->name}}</td>
                <td>
                    @if($user->sex == '0')
                        男
                    @else
                        女
                    @endif
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->addr}}</td>
                <td>
                    <i class="fa fa-plus"></i><a href="{{url('admin/user/add')}}">添加</a>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-edit"></i><a href="{{url('admin/user/edit').'/'.$user->user_id}}">编辑</a>&nbsp;&nbsp;&nbsp;
                    <i class="fa fa-minus"></i><a href="{{url('admin/user/del')}}" id="del" rowId="{{$user->user_id}}">删除</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.page')
    </div>

</div>
<script>
    $(function(){
       $('#del').on('click',function(e){
           e.preventDefault();
           var _url = $(this).attr('href'),user_id = $(this).attr('rowId'),$tr = $(this).parents('tr');
          $.post(_url,{'id':user_id},function(res){
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