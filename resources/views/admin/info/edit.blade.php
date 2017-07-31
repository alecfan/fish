@extends('admin.parent') @section('basecss')
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}" />
@endsection @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
                个人资料 <small> <i class="icon-double-angle-right"></i> 修改头像
      </small>
    </h1>
  </div>
  <div class="page-content">
           原头像：
    <img id="avatar"
      class="editable img-responsive" alt="Alex's Avatar"
      src="{{ asset('home/upload') }}/{{ $list->photo }}"
      style="width: 200px;" /><br>
      <div style="clearfix"></div>
    <form action="{{ url('admin/info').'/'.$list->id }}" method='post' enctype='multipart/form-data' >
    {{ csrf_field() }} {{ method_field('PUT') }}
              新头像：<input type="file" name="photo" /><br>
     <button class="btn btn-info" type="submit">
      <i class="icon-ok bigger-1100"></i> 修改
     </button>
    </form>
  </div>
</div>
@endsection
