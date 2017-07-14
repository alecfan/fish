@extends('admin.parent') @section('content')
<div class="main-content">
  <div class="page-content">
    <div class="page-header">
      <h1>
                商品管理
                <small>
                    <i class="icon-double-angle-right"></i>
                    添加商品
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
        <form action="{{ url('admin/goods') }}" method='post' class="form-horizontal" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品标题 </label>
            <div class="col-sm-9">
              <input type="text" name="title" id="form-field-1" placeholder="商品标题" class="col-xs-10 col-sm-5" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品价格</label>
            <div class="col-sm-9">
              <input type="text" name="price" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="商品价格" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品描述</label>
            <div class="col-sm-9">
              <input type="text" name="description" id="form-field-1" class="col-xs-10 col-sm-5" placeholder="商品描述" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">商品类别</label>
            <select class="col-xs-10 col-sm-3" id="form-field-select-1" style='margin-left:12px' name='tid'>
              <option value="1" selected>手机</option>
              <option value="2">服装</option>
              <option value="3">电脑</option>
              <option value="4">运动户外</option>
              <option value="5">美妆</option>
            </select>
          </div>
          <div>
            <input type="hidden" value='0' />
          </div>
          <div class="space-4"></div>
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
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.page-content -->
</div>
<!-- /.main-content -->
@endsection
