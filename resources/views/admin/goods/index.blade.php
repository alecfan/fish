@extends('admin.parent') {{-- 打开左侧分类列表 --}} @section('goodsOpen') class="open" @endsection {{-- 选中分类列表显示 --}} @section('goodsListActive') class="active" @endsection {{-- 列表显示 --}} @section('goodsShow') style="display:block" @endsection {{-- 显示分类列表页 --}} @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
        商品管理
        <small>
          <i class="icon-double-angle-right"></i>
          商品列表
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
    <form action="/admin/goods" method='get'>
      <div class="col-xs-12 col-sm-4">
        <div class="input-group">
          <input type="text" name="title" class="form-control search-query" placeholder="商品标题" /><span class="input-group-btn">
            <button type="submit" class="btn btn-purple btn-sm">
              <i class="icon-search icon-on-right bigger-110"></i>
              搜索
            </button>
          </span>
        </div>
      </div>
    </form>
    <div class="col-xs-12">
      <div class="table-responsive">
        <form name='myform' action="" style='display:none' method='post'>
          {{ csrf_field() }} {{ method_field('DELETE') }}
        </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>商品标题</th>
              <th>商品描述</th>
              <th>价格</th>
              <th>类别名</th>
              <th>卖家姓名</th>
              <th>添加时间</th>
              <th>是否下架</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
        $i = ($now - 1) * 6 + 1;
        ?>
            @foreach($list as $v)

            <tr>
              <td>{{
                  $i

              }}</td>
              <td>{{ $v->title }}</td>
              <td style='width:230px'>{{ $v->description }}</td>
              <td>{{ $v->price }}</td>
              <td>{{ $v->tname }}</td>
              <td>{{ $v->username }}</td>
              <td>
                {{ date('Y-m-d H:i', $v->addtime) }}
              </td>
              <td>{{ ($v->status==0)?'正常':'下架' }}</td>
              <td>
                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                  <a href='/admin/goods/{{ $v->id }}/edit'>
                    <button class="btn btn-xs btn-info">
                      <i class="icon-edit bigger-120"></i>
                    </button>
                  </a>
                  <a href='javascript:doDel({{ $v->id }})'>
                    <button class="btn btn-xs btn-danger">
                      <i class="icon-trash bigger-120"></i>
                    </button>
                  </a>
                  <a href='/admin/comment/{{ $v->id }}'>
                  <button class="btn btn-xs btn-warning">
                      <i class="icon-heart"></i>
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
        {!! $list->appends($where)->render() !!}
      </div>
    </div>
  </div>
</div>
<script>
function doDel(id) {
  var form = document . myform;
  var url = "{{ url('admin/goods') }}"
  form.action = url + '/' + id;
                form . submit();
            }
            ;
</script>
@endsection
