@extends('admin.parent') @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>个人资料</h1>
  </div>
  <!-- /.page-header -->
  <div class="row">
    <div class="col-xs-12">
      <div>
        <div id="user-profile-1" class="user-profile row">
          <div class="col-xs-12 col-sm-2 center">
            <div>
              <span class="profile-picture"><a href="{{ url('admin/info') . '/' . $list->id }}/edit"><img id="avatar"
                class="editable img-responsive" alt="Alex's Avatar"
                src="{{ asset('home/upload') }}/{{ $list->photo }}"
                style="width: 280px;" /></a>
              </span>
              <div class="space-4"></div>
              <div
                class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                  <a href="#" class="user-title-label dropdown-toggle"
                    data-toggle="dropdown"> <i
                    class="icon-circle light-green middle"></i> &nbsp; <span
                    class="white">{{ $list->username }}</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-10">
            <div class="profile-user-info profile-user-info-striped">
              <div class="profile-info-row">
                <div class="profile-info-name">性别</div>
                <div class="profile-info-value">
                  <span class="sex" id="sex">{{ ($list->sex)== '1' ? '男':'女' }}</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name">所在地</div>
                <div class="profile-info-value">
                  <i class="icon-map-marker light-orange bigger-110"></i>
                  <span class="editable" id="address">{{ $list->address == '' ? '未填写' : $list->address }}</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name">邮箱</div>
                <div class="profile-info-value">
                  <span class="editable" id="email">{{ $list->email == '' ? '未填写' : $list->email }}</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name">手机</div>
                <div class="profile-info-value">
                  <span class="editable" id="phone">{{ $list->phone == '' ? '未填写' : $list->phone }}</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name">生日</div>
                <div class="profile-info-value">
                  <span class="editable" id="birthday">{{ $list->birthday == '' ? '未填写' : $list->birthday }}</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name">积分</div>
                <div class="profile-info-value">
                  <span class="lala" id="score">{{ $list->score == '' ? '未填写' : $list->score }}</span>
                </div>
              </div>
              <div class="profile-info-row">
                <div class="profile-info-name">个人简介</div>
                <div class="profile-info-value">
                  <span class="editable" id="description">{{ $list->description == '' ? '未填写' : $list->description }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection @section('basejs')
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.dataTables.bootstrap.js') }}"></script>
@endsection
@section('inlinejs')
<script>
//修改下拉框
$('.sex').dblclick(function() {
    //获取修改的字段名
    var name = 'sex';
    //获取用户的ID
    var id = {{ $list->id }};
  var v = $(this).html();
  var input = $('<select><option value ="1">男</option><option value ="0">女</option></select>');
  input.val(v);
  $(this).html(input);
  input.dblclick(function () {
         return false;
    });
  var span = $(this);
  //当失去焦点时
  input.blur(function() {
    // 获取用户输入的内容
    var value = $(this).val();
    var url = "{{ url('admin/info/create') }}";
     $.ajax({
          url: url,
          type: 'post',
          dataType: 'json',
          data: {
            id:id,name:name,value:value,
            '_token': "{{ csrf_token() }}"
          },
          success: function(data) {
              if(data){
                if(value == "1"){
                	span.html('男');
                }else {
                	span.html('女');
                }
                alert('修改成功');
              } else {
                span.html(v);
                alert('修改失败');
              }
          }
    },'json');
  });
});
//修改input框的
$('.editable').dblclick(function() {
    //获取修改的字段名
    var name = $(this).attr('id');
    //获取用户的ID
    var id = {{ $list->id }};
	var v = $(this).html();
	var input = $('<input type="text" class="form-control" />');
	input.val(v);
	$(this).html(input);
	input.dblclick(function () {
         return false;
    });
	var span = $(this);
	//当失去焦点时
	input.blur(function() {
		// 获取用户输入的内容
		var value = $(this).val();
        if(!value){
          value = v;
        }
		var url = "{{ url('admin/info/create') }}";
		 $.ajax({
    	    url: url,
    	    type: 'post',
    	    dataType: 'json',
    	    data: {
    	      id:id,name:name,value:value,
    	      '_token': "{{ csrf_token() }}"
    	    },
    	    success: function(data) {
              if(data){
                span.html(value);
                alert('修改成功');
              } else {
                span.html(v);
                alert('修改失败');
              }
    	    }
		},'json');
	});
});
</script>
@endsection
