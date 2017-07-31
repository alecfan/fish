@extends('admin.parent') @section('usersOpen') class="open" @endsection
@section('usersShow') style="display:block" @endsection
@section('usersListActive') class="active" @endsection
@section('parentPath')
<li><a href="/admin/user">用户管理</a></li>
@endsection @section('path')
<li class="active">用户列表</li>
@endsection @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
      用户管理 <small> <i class="icon-double-angle-right"></i> 用户列表
      </small>
    </h1>
  </div>
  @if (session('msg'))
  <div class="alert alert-success">{{ session('msg') }}</div>
  @endif @if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif
  <div class="row">
    <form action='{{ url("admin/user") }}'>
      <div class="col-xs-12 col-sm-4">
        <div class="input-group">
          <input type="text" name="username"
            class="form-control search-query" placeholder="用户名" /><span
            class="input-group-btn">
            <button type="submit" class="btn btn-purple btn-sm">
              <i class="icon-search icon-on-right bigger-110"></i> 搜索
            </button>
          </span>
        </div>
      </div>
    </form>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
    <button onclick="doCatch()" type="submit"
      class="btn btn-purple btn-sm">
      <i class=""></i> 删除选中
    </button>
    <div class="col-xs-12">
      <div class="table-responsive">
        <form name='myform' action="" method='post'>{{ csrf_field() }}
          {{ method_field('DELETE') }}</form>
        <table id="sample-table-1"
          class="table table-striped table-bordered table-hover">
          <thead>
            <tr style="text-align: center;">
              <th class="center"><label> <input type="checkbox"
                  class="ace"> <span class="lbl"></span>
              </label></th>
              <th>用户名</th>
              <th>身份</th>
              <th>状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach($list as $v)
            <tr>
              <td class="center"><label> <input id="{{ $v->id }}"
                  name="check" type="checkbox" class="ace"> <span
                  class="lbl"></span>
              </label></td>
              <td>{{ $v->username }}</td> @if (($v->admin)== '0')
              <td>普通用户</td> @endif @if(($v->admin)== '1')
              <td>普通管理员</td> @endif
              <td>{{ ($v->login) == 1 ? '允许登录':'禁止登录' }}</td>
              <td>
                <div
                  class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                  <a href="{{ url('admin/user') . '/' . $v->id . '/' . 'edit' }}">
                    <button class="btn btn-xs btn-info">
                      <i class="icon-edit bigger-120"></i>
                    </button>
                  </a> <a href='javascript:doDel({{ $v->id }})'>
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
@endsection @section('basejs')
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.bootstrap.js') }}"></script>
@endsection @section('inlinejs')
<script>
function doDel(id) {
  if (confirm('确定删除？')) {
    var form = document.myform;
    form.action = "{{ url('admin/user') }}" + '/' + id;
    alert(form.action);
    form.submit();
  }
}

$('table th input:checkbox').on('click', function() {
  var that = this;
  $(this).closest('table').find('tr > td:first-child input:checkbox')
    .each(function() {
      this.checked = that.checked;
      $(this).closest('tr').toggleClass('selected');
    });
});

var arr = [];
var sun = $("input[name='check']");
function doCatch() {
  for (var i = 0; i < sun.length; i++) {
    if (sun[i].checked) {
      arr[arr.length] = sun[i].id;
    }
  }
  var id = arr.join("-");
  var url = "{{ url('admin/user/doDel') }}";
  $.ajax({
    url: url,
    type: 'post',
    dataType: 'json',
    data: {
      id: id,
      '_token': "{{ csrf_token() }}"
    },
    success: function(data) {
      if(data > 0){
        alert('删除成功');
        window.location.reload()
      }
    }
  });
}

$
</script>
@endsection
