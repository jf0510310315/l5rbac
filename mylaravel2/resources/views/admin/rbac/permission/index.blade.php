@extends('admin/app')

@section('content')
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>权限控制</small></div>
</div>

<div class="row">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="{{ route('admin.rbac.role.index') }}">角色组</a></li>
        <li role="presentation" ><a href="{{ route('admin.rbac.user.index') }}">用户</a></li>
        <li role="presentation" class="active"><a href="{{ route('admin.rbac.permission.index') }}">权限</a></li>
    </ul>

    <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="{{ route('admin.rbac.permission.create') }}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" /></th><th class="table-id">ID</th><th class="table-title">标题</th><th class="table-type">类别</th><th class="table-author am-hide-sm-only">作者</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td><input type="checkbox" /></td>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->create_at }}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        <div class="btn-group btn-group-xs">
                                            <button type="button" class="btn btn-default"><a class="" href="{{ route('admin.rbac.permission.edit',['id'=>$permission->id]) }}"><span class="glyphicon glyphicon-pencil"></span> 编辑</a></button>
                                            <button type="button" class="btn btn-default"><a class="text-danger permission-delete" data-href="{{ route('admin.rbac.permission.destroy',['id'=>$permission->id]) }}"><span class="glyphicon glyphicon-trash"></span> 删除</a></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {!! with(new \App\Foundation\Pagination\Paginator($permissions))->render() !!}
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>

@stop

@section('javascripts')
@parent
<script type="text/javascript">
    $(".permission-delete").click(function () {
        var href = $(this).data('href');
        if(!confirm('确定删除该权限吗？')){
            return false;
        }
        $.ajax({
            url: href, 
            type: 'POST',
            data: {_token: "{{ csrf_token() }}"},
            type:'DELETE',
            success: function (data) {
                if(data.type == 1){
                    location.reload();
                }
                alert(data.message);
            }
        })
    })

</script>
@stop

