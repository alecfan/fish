@extends('home.person.parent')
@section('showAddCSS')
<link href="{{ asset('home/css/addstyle.css') }}" rel="stylesheet" type="text/css">
@endsection

{{-- 用户收货地址主体页 --}}
@section('content')
<div class="user-address">
  <!--标题 -->
  <div class="am-cf am-padding">
    <div class="am-fl am-cf">
      <strong class="am-text-danger am-text-lg">添加闲置</strong> / <small>Add&nbsp;goods</small>
    </div>
  </div>
  <hr>

  <div class="clear"></div>
  <!--例子-->
  <div class="" id="doc-modal-1">

    <div class="add-dress">
      <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
        <form class="am-form am-form-horizontal">

          <div class="am-form-group">
            <label for="user-name" class="am-form-label">发布标题</label>
            <div class="am-form-content">
              <input type="text" id="user-name" placeholder="标题 品类品牌型号">
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">宝贝描述</label>
            <div class="am-form-content">
              <textarea class="" rows="3" id="user-intro" placeholder="描述一下你的闲置"></textarea>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">添加图片</label>
            <div class="am-form-content">
              <input type="file" name="" id="" multiple="multiple" />
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-address" class="am-form-label">分类</label>
            <div class="am-form-content address">
              <select data-am-selected="" style="display: none;">
                <option value="a">浙江省</option>
                <option value="b" selected="">湖北省</option>
              </select>

              <select data-am-selected="" style="display: none;">
                <option value="a">温州市</option>
                <option value="b" selected="">武汉市</option>
              </select>

              <select data-am-selected="" style="display: none;">
                <option value="a">瑞安区</option>
                <option value="b" selected="">洪山区</option>
              </select>
            </div>
          </div>



          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <a class="am-btn am-btn-danger">确定发布</a> <a href="javascript: void(0)" class="am-close am-btn am-btn-danger"
                data-am-modal-close="">取消</a>
            </div>
          </div>
        </form>
      </div>

    </div>

  </div>

</div>
<script type="text/javascript">
            $(document).ready(function() {
              $(".new-option-r").click(function() {
                $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
              });

              var $ww = $(window).width();
              if($ww>640) {
                $("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
              }

            })
          </script>
<div class="clear"></div>
@endsection