@extends('home.person.parent') @section('showAddCSS')
<link href="{{ asset('home/css/addstyle.css') }}" rel="stylesheet"
  type="text/css">
@endsection @section('addActive') active @endsection
<script>
@if (session('add'))
alert('添加成功');
@endif
@if (session('del'))
alert('删除成功');
@endif
@if (session('error'))
alert('删除失败');
@endif
@if (session('update'))
alert('修改成功');
@endif
</script>
{{-- 用户收货地址主体页 --}} @section('content')
<div class="user-address">
  <!--标题 -->
  <div class="am-cf am-padding">
    <div class="am-fl am-cf">
      <strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small>
    </div>
  </div>
  <hr>
  <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
    @foreach($list as $v)
    <li class="user-addresslist">
      <p class="new-tit new-p-re">
        <span class="new-txt">{{ $v->name }} </span> <span
          class="new-txt-rd2">{{ $v->phone }}</span>
      </p>
      <div class="new-mu_l2a new-p-re">
        <p class="new-mu_l2cw">
          <span class="title">地址：</span> <span class="city">{{
            $v->province }}{{ $v->city }}{{ $v->county }}</span><span
            class="street">{{ $v->info }}</span>
        </p>
      </div>
      <form id='form' action="" method='post'>{{ csrf_field() }}{{
        method_field('DELETE') }}</form>
      <div class="new-addr-btn">
        <a href="{{ url('person/address') }}/{{ $v->id }}/edit"><i class="am-icon-edit"></i>编辑</a> <span
          class="new-addr-bar">|</span> <a
          href="javascript:doDel({{ $v->id }})"><i class="am-icon-trash"></i>删除</a>
      </div></li> @endforeach
  </ul>
  <div class="clear"></div>
  <a class="new-abtn-type"
    data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
  <!--例子-->
  <div class="" id="doc-modal-1">
    <div class="add-dress">
      <div class="am-cf am-padding">
        <div class="am-fl am-cf">
          <strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small>
        </div>
      </div>
      <hr>
      <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
        <form action="{{ url('person/address') }}" id="myform"
          method='post' onSubmit="return doCheck()"
          class="am-form am-form-horizontal">
          {{ csrf_field() }}
          <div class="am-form-group">
            <label for="user-name" class="am-form-label">收货人</label>
            <div class="am-form-content">
              <input name="name" type="text" id="name" placeholder="收货人">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-phone" class="am-form-label">手机号码</label>
            <div class="am-form-content">
              <input name="phone" id="phone" placeholder="手机号必填"
                type="text">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-address" class="am-form-label">所在地</label>
            <div class="am-form-content address">
              <select name="province" id="cid">
                <option>---请选择---</option>
              </select>
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-intro" class="am-form-label">详细地址</label>
            <div class="am-form-content">
              <textarea name="info" class="" rows="3" id="user-intro"
                placeholder="输入详细地址"></textarea>
              <small>100字以内写出你的详细地址...</small>
            </div>
          </div>
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button class="am-btn am-btn-danger" type="submit">
                <i class="icon-ok bigger-110"></i> 添加
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
var url = "{{ url('person/address/1') }}";
$.ajax({
  url:url,
  type:'get',
  dataType:'json',
  data:{upid:0},
  success:function(data){
    for (var i = 0; i < data.length; i++) {
      $('#cid').append("<option value="+data[i].id+">"+data[i].name+'</option>');
    }
  }
});

$("body").on('change','select',function(){
  $(this).nextAll('select').remove();
  var v = $(this).val();
  var name = $(this).attr('name');
  if(v != '---请选择---'){
    var ob = $(this);
    $.ajax({
      url:url,
      type:'get',
      dataType:'json',
      data:{upid:v},
      success:function(data){
        if(data.length>0){
          if(name == 'province'){
            var select = $("<select name='city' id='city'><option>---请选择---</option></select>");
          }else{
        	var select = $("<select name='county' id='county'><option>---请选择---</option></select>");
          }
          for (var i = 0; i < data.length; i++) {
            $(select).append("<option value="+data[i].id+">"+data[i].name+'</option>');
          }
          ob.after(select);
        }
      }
    });
  }
});


function doCheck()
{
  var add = document.getElementById('myform');
  if (add.name.value == ''){
      alert('收货人不能为空');
	  return false;
  }
  if (add.phone.value.match(/^1[34578]\d{9}$/) == null){
      alert('手机号格式不对');
	  return false;
  }
  if (add.province.value == ''||add.province.value == '---请选择---'){
      alert('请选择所在地');
	  return false;
  }
  if (add.city.value == ''||add.city.value == '---请选择---'){
      alert('请选择所在地');
	  return false;
  }
  if (add.county.value == ''||add.county.value == '---请选择---'){
      alert('请选择所在地');
	  return false;
  }
  if (add.info.value == ''){
      alert('不能为空');
	  return false;
  }
  return true;
}

function doDel(id) {
	  if (confirm('确定删除？')) {
	    var form = document.getElementById('form');
	    form.action = '/person/address/' + id;
	    form.submit();
	  }
	}
</script>
@endsection
