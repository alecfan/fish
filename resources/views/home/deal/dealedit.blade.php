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
      <strong class="am-text-danger am-text-lg">修改商品</strong> / <small>Edit&nbsp;goods</small>
    </div>
  </div>
  <hr>

  <div class="clear"></div>
  <!--例子-->

  <div class="" id="doc-modal-1">

    <div class="add-dress">
      <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">

        <form action="{{ url('/deal').'/'.$goods->id }}" id="add" method='post' onSubmit="return doAdd()" enctype="multipart/form-data" class="am-form am-form-horizontal">
            {{ csrf_field() }} {{ method_field('PUT') }}
<!--           <div class="am-form-group"> -->
<!--             <label for="user-name" class="am-form-label">发布标题</label> -->
<!--           </div> -->

          <div class="am-form-group">
            <label for="user-name" class="am-form-label">修改标题</label>
            <div class="am-form-content">
              <input name="title" type="text" id="user-name" placeholder="{{$goods->title}}">
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">宝贝描述</label>
            <div class="am-form-content">
              <textarea name="description" class="" rows="3" id="user-intro" placeholder="{{$goods->description}}"></textarea>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">商品价格</label>
            <div class="am-form-content">
            <input name="price" type="text" id="user-name" placeholder="{{$goods->price}}">
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">修改主图</label>
            <div class="am-form-content">
              <input type="file" name="main" id="main" />
              <br>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">添加图片</label>
            <div class="am-form-content">
              <input type="file" name="minor[]" id="minor" multiple="multiple" />
              <br>
            </div>
          </div>


          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button class="am-btn am-btn-danger" type="submit">
                <i class="icon-ok bigger-110"></i> 修改
              </button>
              <a href="" class="am-close am-btn am-btn-danger"
                data-am-modal-close="">取消</a>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
function doAdd()
{
  var add = document.getElementById('add');
  if (add.title.value == ''){
      alert('标题不能为空！');
    return false;
  }
  if (add.description.value == ''){
      alert('描述不能为空!');
    return false;
  }

  if (add.price.value.match(/^[1-9]\d*$/) == null){
    alert('输入价格不合法!');
    return false;
  }else{


  return true;}
}
</script>
@endsection