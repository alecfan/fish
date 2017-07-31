@extends('admin.parent')
{{-- 打开左侧分类列表 --}}
@section('goodsOpen')
  class="open"
@endsection
{{-- 选中分类列表显示 --}}
@section('goodsListActive')
  class="active"
@endsection
{{-- 列表显示 --}}
@section('goodsShow')
  style="display:block"
@endsection
{{-- 显示分类列表页 --}}
@section('content')

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

<!-- /.main-content -->
@endsection
