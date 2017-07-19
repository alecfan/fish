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
        <form action="{{ url('person/goods') }}" id="add" method='post' onSubmit="return doAdd()" enctype="multipart/form-data" class="am-form am-form-horizontal">
            {{ csrf_field() }}
<!--           <div class="am-form-group"> -->
<!--             <label for="user-name" class="am-form-label">发布标题</label> -->
<!--           </div> -->

          <div class="am-form-group">
            <label for="user-name" class="am-form-label">发布标题</label>
            <div class="am-form-content">
              <input name="title" type="text" id="user-name" placeholder="标题 品类品牌型号">
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">宝贝描述</label>
            <div class="am-form-content">
              <textarea name="description" class="" rows="3" id="user-intro" placeholder="描述一下你的闲置"></textarea>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">商品价格</label>
            <div class="am-form-content">
            <input name="price" type="text" id="user-name" placeholder="商品的价格">
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">添加主图</label>
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
            <label for="user-address" class="am-form-label">分类</label>
            <div class="am-form-content address">
              <select id="type" name="first">
                <option>---请选择---</option>
              </select>
            </div>
          </div>

          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button class="am-btn am-btn-danger" type="submit">
                <i class="icon-ok bigger-110"></i> 添加
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
var url = "{{ url('person/goods/1') }}";
$.ajax({
  url:url,
  type:'get',
  dataType:'json',
  data:{pid:0},
  success:function(data){
    for (var i = 0; i < data.length; i++) {
      $('#type').append("<option value="+data[i].id+">"+data[i].tname+'</option>');
    }
  }
});
$("body").on('change','select',function(){
    $(this).nextAll('select').remove();
    var name = $(this).attr('name');
    var v = $(this).val();
    if(v != '---请选择---'){
      var ob = $(this);
      $.ajax({
        url:url,
        type:'get',
        dataType:'json',
        data:{pid:v},
        success:function(data){
          if(data.length>0){
            if(name == 'first'){
              var select = $("<select name='second'><option>---请选择---</option></select>");
            }else{
              var select = $("<select name='tid'><option>---请选择---</option></select>");
            }
            for (var i = 0; i < data.length; i++) {
              $(select).append("<option value="+data[i].id+">"+data[i].tname+'</option>');
            }
            ob.after(select);
          }
        }
      });
    }
 });

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
  }

  if (add.main.value == ''){
	    alert('请上传主图！');
	    return false;
  }
  if (add.first.value == ''||add.first.value == '---请选择---'){
      alert('请选择分类');
    return false;
  }
  if (add.second.value == ''||add.second.value == '---请选择---'){
      alert('请选择分类');
    return false;
  }
  if (add.tid.value == ''||add.tid.value == '---请选择---'){
      alert('请选择分类');
    return false;
  }
  return true;
}
</script>
@endsection