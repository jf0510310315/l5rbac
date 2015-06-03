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
        <li role="presentation" class="active"><a href="{{ route('admin.rbac.user.edit',['id'=>$user->id]) }}">编辑用户</a></li>
    </ul>

    <div class="">
        <div class="tab-panel fade in active" id="tab1">

            @include('admin.alert')
            <form class="form-horizontal" action="{{ route('admin.rbac.user.update',['id'=>$user->id]) }}"method="POST">
            <div class="form-group"></div>
                @if($roles)
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        角色组
                    </label>
                    <div class="col-sm-8">
                        <ul  type="square">
                            @foreach($roles as $role)
                            <li >
                                <label class="checkbox-inline">
                                    @if($user->hasRole($role->name))
                                    <input name="roles[]" type="checkbox" value="{{ $role->id }}" checked> {{ $role->display_name }}
                                    @else
                                    <input name="roles[]" type="checkbox" value="{{ $role->id }}"> {{ $role->display_name }}
                                    @endif
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                @endif

                <div class="form-group">
                    <label  class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="col-sm-2">*必填，不可重复</div>
                  </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                    </div>
                    <div class="col-sm-2">*必填，不可重复</div>
                  </div>


                <div class="form-group">
                    <label  class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" value=""  placeholder="Password">
                    </div>
                    <div class="col-sm-2">只修改密码时填写</div>
                  </div>

                <div class="">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input name="_method" type="hidden" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-primary">提交保存</button>
                        </div>
                      </div>
                </div>

            </form>
        </div>

    </div>
</div>

@stop

