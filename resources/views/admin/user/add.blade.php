@extends('admin.parent') @section('usersOpen') class="open" @endsection @section('usersShow') style="display:block" @endsection @section('usersAddActive') class="active" @endsection @section('parentPath')
<li>
  <a href="/admin/user">用户管理</a>
</li>
@endsection @section('path')
<li class="active">添加用户</li>
@endsection @section('parentPathName') 用户管理 @endsection @section('pathName') 添加用户 @endsection @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
        用户管理
        <small>
          <i class="icon-double-angle-right"></i>
          添加用户
        </small>
      </h1>
  </div>
  <!-- /.page-header -->
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="row">
    <div class="col-xs-12">
      <form action='{{ url("admin/user") }}' method='post' class="form-horizontal" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 权限 </label>
          <div class="col-sm-9">
            <select name="admin" id="form-field-2" class="col-xs-10 col-sm-5">
              <option value="0">普通用户</option>
              <option value="1">普通管理员</option>
              <option value="2">超级管理员</option>
            </select>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 状态 </label>
          <div class="col-sm-9">
            <select name="login" id="form-field-2" class="col-xs-10 col-sm-5">
              <option value="0">禁止登录</option>
              <option value="1">允许登录</option>
            </select>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>
          <div class="col-sm-9">
            <input type="text" name="username" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码 </label>
          <div class="col-sm-9">
            <input type="password" name="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" />
          </div>
        </div>
        <div class="clearfix form-actions">
          <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
              <i class="icon-ok bigger-110"></i> 添加
            </button>
            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
              <i class="icon-undo bigger-110"></i> 重置
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
