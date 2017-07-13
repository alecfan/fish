@extends('admin.parent') @section('usersOpen') class="open" @endsection @section('usersShow') style="display:block" @endsection @section('usersListActive') class="active" @endsection

@section('parentPath')
<li>
  <a href="/admin/user">用户管理</a>
</li>
@endsection @section('path')
<li class="active">用户列表</li>
@endsection @section('parentPathName') 用户管理 @endsection @section('pathName') 用户列表 @endsection


@section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
        用户管理
        <small>
          <i class="icon-double-angle-right"></i>
          用户列表
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
    <form action='{{ url("admin/user") }}'>
      <div class="col-xs-12 col-sm-4">
        <div class="input-group">
          <input type="text" name="username" class="form-control search-query" placeholder="用户名" /><span class="input-group-btn">
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
            <tr style="text-align:center;">
              <th>ID</th>
              <th>用户名</th>
              <th>身份</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $v)
            <tr>
              <td>{{ $v->id }}</td>
              <td>{{ $v->username }}</td>
              @if (($v->admin)== '0')
              <td>普通用户</td>
              @endif @if(($v->admin)== '1')
              <td>普通管理员</td>
              @endif @if(($v->admin)== '2')
              <td>超级管理员</td>
              @endif
              <td>{{ ($v->login) == 1 ? '允许登录':'禁止登录' }}</td>
              <td>
                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                  <a href='/admin/user/{{ $v->id }}/edit'>
                    <button class="btn btn-xs btn-info">
                      <i class="icon-edit bigger-120"></i>
                    </button>
                  </a>
                  <a href='javascript:doDel({{ $v->id }})'>
                    <button class="btn btn-xs btn-danger">
                      <i class="icon-trash bigger-120"></i>
                    </button>
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {!! $list->appends($where)->render() !!}
    </div>
  </div>
</div>
<script>
function doDel(id) {
  if (confirm('确定删除？')) {
    var form = document.myform;
    form.action = '/admin/user/' + id;
    form.submit();
  }
}
</script>
@endsection
