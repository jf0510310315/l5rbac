@extends('admin/app')

@section('content')
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>权限控制</small>
    </div>
</div>

<div class="row">
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="{{ route('admin.rbac.role.index') }}">角色组</a></li>
        <li role="presentation"><a href="{{ route('admin.rbac.user.index') }}">用户</a></li>
        <li role="presentation"><a href="{{ route('admin.rbac.permission.index') }}">权限</a></li>
        <li role="presentation" class="active"><a href="{{ route('admin.rbac.role.edit',['id'=>$role->id]) }}">编辑角色</a></li>
    </ul>

    <div class="">
        <div class="tab-panel fade in active" id="tab1">

            @include('admin.alert')

            <form class="form-horizontal" action="{{ route('admin.rbac.role.update',['id'=>$role->id]) }}" method="POST">

                <div class="form-group"></div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">角色标识</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="{{ $role->name }}" disabled>
                    </div>
                    <div class="col-sm-2"></div>
                  </div>

                  <div class="form-group">
                      <label  class="col-sm-2 control-label">显示名称</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" >
                      </div>
                      <div class="col-sm-2">选填</div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">说明</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="description" value="{{ $role->description }}" >
                        </div>
                        <div class="col-sm-2">选填</div>
                      </div>


                <div class="">
                    <div class="">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">提交保存</button>
                        </div>
                      </div>
                </div>


            </form>
        </div>

    </div>
</div>

@stop

