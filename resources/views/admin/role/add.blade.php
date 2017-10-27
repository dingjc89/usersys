<link rel="stylesheet" href="{{asset('css/plugins/steps/jquery.steps.css')}}">
<form id="form" action="{{url('admin/role/store')}}" method="post" class="wizard-big wizard clearfix" role="application" novalidate="novalidate">
    {{csrf_field()}}
    <input type="hidden" name="pid" value="{{$roleNode['pid']}}">
    <input type="hidden" name="path" value="{{$roleNode['path']}}">
        <h1 id="form-h-0" tabindex="-1" class="title current">角色</h1>
        <fieldset id="form-p-0" role="tabpanel" aria-labelledby="form-h-0" class="body current" aria-hidden="false">
            <h2>角色信息</h2>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>角色 *</label>
                        <input id="roleName" name="roleName" type="text" class="form-control required" aria-required="true" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <div style="margin-top: 20px">
                            <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <h1 id="form-h-1" tabindex="-1" class="title">人员选择</h1>
        <fieldset id="form-p-1" role="tabpanel" aria-labelledby="form-h-1" class="body" aria-hidden="true" style="display: none;">
            <h2>用户信息</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>选择用户 *</label>
                        <select class="chosen-select form-control" multiple name="userName[]" id="userName">
                            @foreach($users as $user)
                            <option value="{{$user->user_id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>
        <h1 id="form-h-2" tabindex="-1" class="title">权限设置</h1>
        <fieldset id="form-p-2" role="tabpanel" aria-labelledby="form-h-2" class="body" aria-hidden="true" style="display: none;">
            <h2>权限设置</h2>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            @foreach($table as $key=>$value)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$key}}" aria-expanded="false" class="collapsed">{{$value}}</a>
                                    </h5>
                                </div>
                                <div id="collapseOne-{{$key}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <div class="permissions">
                                            <ul>
                                                @if(isset($permissions[$key]))
                                                @foreach($permissions[$key] as $permission)
                                                <li>
                                                    <div class="i-checks">
                                                        <input type="checkbox" class="i-checks" name="permissions[]" value="{{$permission['permission_id']}}">{{$permission['desc']}}
                                                    <div>
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="tabs-container">

                                            <div class="tabs-left">
                                                <ul class="nav nav-tabs" style="list-style: none;">
                                                    <li class="active"><a data-toggle="tab" href="#tab-{{$key}}-8" aria-expanded="true"> 字段编辑</a>
                                                    </li>
                                                    <li class=""><a data-toggle="tab" href="#tab-{{$key}}-9" aria-expanded="false"> 字段查看</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content ">
                                                    @if(isset($permissions[$key]['edit']) && isset($permissions[$key]['edit']['detail']))
                                                    <div id="tab-{{$key}}-8" class="tab-pane active">
                                                        <div class="panel-body">
                                                            <ul>
                                                                @foreach($permissions[$key]['edit']['detail'] as $filed)
                                                                <li>
                                                                    <div class="checkbox m-l m-r-xs">
                                                                        <input type="checkbox" name="permissions[]" class="i-checks" value="{{$filed['permission_id']}}">{{$filed['desc']}}
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if(isset($permissions[$key]['view']) && isset($permissions[$key]['view']['detail']))
                                                    <div id="tab-{{$key}}-9" class="tab-pane">
                                                         <div class="panel-body">
                                                            <ul>
                                                                @foreach($permissions[$key]['view']['detail'] as $filed)
                                                                <li>
                                                                    <div class="checkbox m-l m-r-xs">
                                                                        <input type="checkbox" name="permissions[]" class="i-checks" value="{{$filed['permission_id']}}">{{$filed['desc']}}
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </fieldset>
</form>
<script src="{{asset('js/admin/plugins/steps/jquery.steps.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex) {
                if (currentIndex > newIndex) {
                    return true;
                }

                var form = $(this);

                if (currentIndex < newIndex) {
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }
                if(currentIndex === 0){
                    if(!form.find('#roleName').val()){
                        form.find(".form-group").addClass(".error");
                        return false;
                    }
                }
                if(currentIndex === 1){
                    if(!form.find('#userName').val()){
                        form.find(".form-group").addClass(".error");
                        return false;
                    }
                }

                // 验证
                return true;
            },
            onStepChanged: function (event, currentIndex, priorIndex) {
                if (currentIndex === 2) {
                    $(this).steps("next");
                }

                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex) {
                var form = $(this),result=false;

                // 验证
                $.each(form.find('input.i-checks'),function(index,el){
                    result = result || el.checked;
                });
                return result;
            },
            onFinished: function (event, currentIndex) {
                var $form = $(this);

                $.ajax({
                    url:$form.attr('action'),
                    datatype:'json',
                    data:$form.serialize(),
                    type:"post",
                    success:function(res){
                        if (res.status == 'succ') {
                            layer.alert(res.data,function(index){
                                layer.close(index);
                                window.location.href = "{{url('admin/role')}}";
                            });
                        } else {
                            layer.alert(res.data);
                        }
                    },
                    error:function(res){
                        layer.alert('保存失败');
                    }
                });
            }
        });
        // 人员选择
        $('.chosen-select').chosen({width:"85%"});

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>