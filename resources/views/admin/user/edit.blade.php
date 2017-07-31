@extends('admin.parent') @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
      <a href="{{ url('admin/user') }}">
        <button class="btn btn-inif btn-sm">
          <i class="icon-reply icon-only"></i>
        </button>
      </a> &nbsp; 用户管理 <small> <i class="icon-double-angle-right"></i>
        编辑用户
      </small>
    </h1>
  </div>
  <!-- /.page-header -->
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li> @endforeach
    </ul>
  </div>
  @endif
  <div class="row">
    <div class="col-xs-12">
      <form action="{{ url('admin/user') . '/' . $list->id }}" method='post'
        class="form-horizontal" role="form">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"
            for="form-field-1"> 用户名 </label>
          <div class="col-sm-9">
            <input type="text" name="username"
              value="{{ $list->username }}" id="form-field-1"
              class="col-xs-10 col-sm-5" disabled />
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"
            for="form-field-2"> 密码 </label>
          <div class="col-sm-9">
            <input type="password" name="password" value=""
              id="form-field-2" placeholder="默认为不修改密码"
              class="col-xs-10 col-sm-5" />
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"
            for="form-field-2"> 权限 </label>
          <div class="col-sm-9">
            <select name="admin" id="form-field-2"
              class="col-xs-10 col-sm-5">
              <option value="0" @if(($list->admin) == '0') selected
                @endif >普通用户</option>
              <option value="1" @if(($list->admin) == '1') selected
                @endif >普通管理员</option>
            </select>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"
            for="form-field-2"> 状态 </label>
          <div class="col-sm-9">
            <select name="login" id="form-field-2"
              class="col-xs-10 col-sm-5">
              <option value="0" @if(($list->login) == '0') selected
                @endif >禁止登录</option>
              <option value="1" @if(($list->login) == '1') selected
                @endif >允许登录</option>
            </select>
          </div>
        </div>
        <div class="clearfix form-actions">
          <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
              <i class="icon-ok bigger-110"></i> 修改
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
