@if($alert = Session::get('fdd-alert'))
<div class="alert alert-{{ $alert['type'] }}"  data-am-sticky="{animation: 'slide-top'}">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    @if($alert['type'] == 'success')
    <h4>成功</h4>
    @elseif($alert['type'] == 'warning')
    <h4>警告</h4>
    @elseif($alert['type'] == 'danger')
    <h4>错误</h4>
    @else
    <h4>提示</h4>
    @endif
    @foreach($alert['data'] as $item)
    <p>{{ $item }}</p>
    @endforeach
    <p><?php echo date('Y-m-d H:i:s',time()) ?></p> <!-- 暂时先这样嵌入php -->
</div>
@endif

<!-- 到时候写一段js 5秒之后将上面的div隐藏掉 -->
