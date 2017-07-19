<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>登录页面</title>
  <meta name="keywords" content="Bootstrap模版,Bootstrap模版下载,Bootstrap教程,Bootstrap中文" />
  <meta name="description" content="站长素材提供Bootstrap模版,Bootstrap教程,Bootstrap中文翻译等相关Bootstrap插件下载" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- basic styles -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/font-Open-Sans.css') }}" />
  <!-- ace styles -->
  <link rel="stylesheet" href="{{ asset('admin/css/ace.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/ace-rtl.min.css') }}" />
</head>

<body class="login-layout">
  <div class="main-container">
    <div class="main-content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="login-container">
            <div class="center">
              <h1>
                <i class="icon-fire red"></i>
                <span class="green">Fish</span>
                <span class="white">后台管理应用</span>
              </h1>
              <h4 class="blue">&copy; lamp184无名团队</h4>
            </div>
            <div class="space-6"></div>
            <div class="position-relative">
              <div id="login-box" class="login-box visible widget-box no-border">
                <div class="widget-body">
                  <div class="widget-main">
                    @if(session('msg'))
                    <h4 class="header red lighter bigger">
                        {{ session('msg') }}
                    </h4> @else
                    <h4 class="header blue lighter bigger">
                        <i class="icon-coffee green"></i>
                        管理员登录
                    </h4> @endif
                    <div class="space-6"></div>
                    <form action='{{ url("admin/login") }}' method='post'>
                      {{ csrf_field() }}
                      <fieldset>
                        <label class="block clearfix">
                          <span class="block input-icon input-icon-right">
                              <input type="text" name="username" class="form-control" placeholder="请输入用户名" autocomplete="off" />
                              <i class="icon-user"></i>
                          </span>
                        </label>
                        <label class="block clearfix">
                          <span class="block input-icon input-icon-right">
                              <input type="password" name="password" class="form-control" placeholder="请输入密码" />
                              <i class="icon-lock"></i>
                          </span>
                        </label>
                        <label class="block clearfix">
                          <span class="block input-icon input-icon-right">
                              <input type="text" name="code" class="form-control" placeholder="请输入验证码" autocomplete="off" />
                              <i class="icon-book"></i>
                          </span>
                        </label>
                        <label class="block clearfix">
                          <span class="block input-icon input-icon-right">
                            <img src="{{ url('admin/getvcode/'.time() ) }}" onclick="this.src='{{ url('admin/getvcode') }}/'+Math.random()">
                          </span>
                        </label>
                        <div class="space"></div>
                        <div class="clearfix">
                          <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                            <i class="icon-key"></i> 登录
                          </button>
                        </div>
                        <div class="space-4"></div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('admin/js/jquery-2.0.3.min.js') }}"></script>
  <script type="text/javascript">
  window.jQuery || document.write("<script src='{{ asset('admin/js/jquery-2.0.3.min.js') }}'>" + "<" + "/script>");
  </script>
  <script type="text/javascript">
  if ("ontouchend" in document) document.write("<script src='{{ asset('admin/js/jquery.mobile.custom.min.js') }}'>" + "<" + "/script>");
  </script>
  <script type="text/javascript">
  function show_box(id) {
    jQuery('.widget-box.visible').removeClass('visible');
    jQuery('#' + id).addClass('visible');
  }
  </script>
</body>

</html>
