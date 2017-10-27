<div class="ibox-title">
    <h5>用户 <small>编辑</small></h5>
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
    <form method="get" class="form-horizontal" action="{{url('admin/user/store')}}">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$user->user_id}}">
        <div class="form-group">
            <label class="col-sm-2 control-label">用户：</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">性别：</label>
            <div class="col-sm-10">
                <div class="radio i-checks">
                    <input type="radio" class="form-control" name="sex" value="0" @if($user->sex == '0') checked @endif>男
                </div>
                <div class="radio i-checks">
                    <input type="radio" class="form-control" name="sex" value="1" @if($user->sex == '1') checked @endif>女
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">邮件：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">地址：</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="addr" value="{{$user->addr}}">
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
<script>
    $(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        $('form').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields:{
                name:{
                    validators:{
                        notEmpty:{
                            message:"用户名不能为空"
                        },
                        stringLength:{
                            min:6,
                            max:15,
                            message:"请输入%s到%s个字符"
                        }
                    }
                },
                email:{
                    validators:{
                        notEmpty:{
                            message:"邮件地址不能为空"
                        },
                        emailAddress:{
                            message:"邮件地址格式不正确"
                        }
                    }
                },
                addr:{
                    validators:{
                        notEmpty:{
                            message:"地址不能为空"
                        }
                    }
                }
            },
        }).on('success.form.bv',function(e){
            e.preventDefault();
            var $form = $(e.target);
            $.ajax({
                url:$form.attr('action'),
                datatype:'json',
                data:$form.serialize(),
                type:"post",
                success:function(res){
                    if (res.status == 'succ') {
                        layer.alert(res.data,function(index){
                            layer.close(index);
                            window.location.href = "{{url('admin/user')}}";
                        });
                    } else {
                        layer.alert(res.data);
                    }
                },
                error:function(res){
                    layer.alert('保存失败');
                }
            });
        });
    });
</script>