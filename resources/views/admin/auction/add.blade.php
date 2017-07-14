@extends('admin.parent') {{-- 打开左侧分类列表 --}} @section('parentPath')
<li><a href="/admin/auction">拍卖管理</a></li>
@endsection @section('path')
<li class="active">发布拍卖</li>
@endsection @section('auctionOpen') class="open" @endsection {{-- 选中分类列表显示 --}} @section('auctionAddActive') class="active" @endsection {{-- 列表显示 --}} @section('auctionShow') style="display:block" @endsection {{-- 显示分类列表页 --}} @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
        拍卖管理
        <small>
            <i class="icon-double-angle-right"></i>
            发布拍卖
        </small>
    </h1>
  </div>
  <!-- /.page-header -->
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <form class="form-horizontal" role="form" action="/admin/auction" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 发布标题 </label>
          <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="标题 品类品牌型号" class="col-xs-10 col-sm-5" name="title">
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 商品描述 </label>
          <div class="col-sm-4">
            <textarea class="form-control" id="form-field-8" placeholder="描述一下你的闲置" cols="300" rows="5" style="resize: none" name="description"></textarea>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">起拍价</label>
          <div class="col-sm-9">
            <span class="input-icon">
                <input type="text" id="form-field-icon-1" name="startprice">
                <i class="icon-jpy green"></i>
            </span>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">保证金</label>
          <div class="col-sm-9">
            <span class="input-icon">
                <input type="text" id="form-field-icon-1" name="cash">
                <i class="icon-jpy green"></i>
            </span>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right">加价幅度</label>
          <div class="col-sm-9">
            <span class="input-icon">
                <input type="text" id="form-field-icon-1" name="incre">
                <i class="icon-jpy green"></i>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-6">开拍时间</label>
          <div class="col-sm-2">
            <div class="input-group input-group-sm">
              <input type="text" id="datepicker" placeholder="请选择开拍时间" class="form-control hasDatepicker" name="starttime">
              <span class="input-group-addon">
                    <i class="icon-calendar"></i>
                </span>
            </div>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">结束时间</label>
          <div class="col-sm-2">
            <div class="input-group input-group-sm">
              <input type="text" id="datepicker" placeholder="请选择结束时间" class="form-control hasDatepicker" name="endtime">
              <span class="input-group-addon"><i class="icon-calendar"></i></span>
            </div>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">分类</label>
          <div class="col-sm-2">
            <select class="form-control" id="form-field-select-1" name="tid">
              <option value="">请选择分类</option>
              <option value="1">Alabama</option>
            </select>
          </div>
        </div>
        <div class="clearfix form-actions">
          <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
              <i class="icon-ok bigger-110"></i> 发布
            </button>
            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
              <i class="icon-undo bigger-110"></i> 重置
            </button>
          </div>
        </div>
      </form>
      <!-- PAGE CONTENT ENDS -->
    </div>
    <!-- /.col -->
  </div>
  <!-- end of page-content -->
</div>
@endsection
