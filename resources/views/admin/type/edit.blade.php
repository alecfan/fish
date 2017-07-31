@extends('admin.parent') @section('content')

  <div class="page-content">
    <div class="page-header">
      <h1>
                分类管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    修改分类
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
        <!-- PAGE CONTENT BEGINS -->
        <form action="{{ url('admin/type').'/'.$type->id }}" method='post' class="form-horizontal" role="form">
          {{ csrf_field() }} {{ method_field('PUT') }}
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 类别名 </label>
            <div class="col-sm-9">
              <input type="text" name="tname" id="form-field-1" placeholder="name" class="col-xs-10 col-sm-5" />
            </div>
          </div>
          <div class="space-4"></div>
          <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
              <button class="btn btn-info" type="submit">
                <i class="icon-ok bigger-110"></i> 修改
              </button>
              &nbsp; &nbsp; &nbsp;
              <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i> 重置
              </button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.page-content -->

<!-- /.main-content -->
@endsection
