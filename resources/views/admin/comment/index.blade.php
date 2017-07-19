@extends('admin.parent') {{-- 打开左侧分类列表 --}} @section('goodsOpen') class="open" @endsection {{-- 选中分类列表显示 --}} @section('goodsListActive') class="active" @endsection {{-- 列表显示 --}} @section('goodsShow') style="display:block" @endsection {{-- 显示分类列表页 --}} @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
                  评论管理
        <small>
          <i class="icon-double-angle-right"></i>
          商品评论列表
        </small>
      </h1>
  </div>
  @if (session('msg'))
  <div class="alert alert-success">
    {{ session('msg') }}
  </div>
  @endif @if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif
  <div class="row">

    <div class="col-xs-12">
      <div class="table-responsive">
        <form name='myform' action="" style='display:none' method='post'>
          {{ csrf_field() }} {{ method_field('DELETE') }}
        </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>评论人</th>
              <th>商品</th>
              <th>评论内容</th>
              <th>评论时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php

$i = ($now - 1) * 6 + 1?>
            @foreach($list as $v)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $v->username }}</td>
              <td>{{ $v->title }}</td>
              <td>{{ $v->content }}</td>
              <td>
                {{ date('Y-m-d H:i', $v->addtime) }}
              </td>
              <td>
                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                  <a href='javascript:doDel({{ $v->id }})'>
                    <button class="btn btn-xs btn-danger">
                      <i class="icon-trash bigger-120"></i>
                    </button>
                  </a>
                </div>
              </td>
            </tr>
            <?php

$i ++;
            ?>
            @endforeach
          </tbody>
        </table>
        {!! $list->render() !!}
      </div>
    </div>
  </div>
</div>
<script>
	function doDel(id) {
		  var form = document.myform;
		  var url = "{{ url('admin/comment') }}"
		  form.action = url + '/' + id;
		  form.submit();
}
</script>
@endsection
