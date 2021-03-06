<!DOCTYPE html>
<html>

<head lang="en">
<meta charset="UTF-8">
<title>注册</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.min.css') }}" />
<link href="{{ asset('home/css/dlstyle.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.min.js') }}"></script>

</head>

<body>

  <div class="login-boxtitle">
    <a href="home/demo.html"><img alt="" src="{{ asset('home/images/logobig.png') }}" /></a>
  </div>

  <div class="res-banner">
    <div class="res-main">
      <div class="login-banner-bg">
        <span></span><img src="{{ asset('home/images/big.jpg') }}" />
      </div>
      <div class="login-box">

        <div class="am-tabs" id="doc-my-tabs">
          <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
            <li class="am-active"><a href="">手机号注册</a></li>
          </ul>

          <div class="am-tabs-bd">
            <div class="am-tab-panel am-active">
              <form action="{{ url('/register') }}" method="post">
                {{ csrf_field() }}
                <div class="user-phone">
                  <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label> <input type="tel"
                    name="phone" id="phone" placeholder="请输入手机号">
                </div>
                <div class="verification">
                  <label for="code"><i class="am-icon-code-fork"></i></label> <input type="tel" name="code" id="code"
                    placeholder="请输入验证码" autocomplete="off"> <a class="btn" href="javascript:void(0);"
                    onclick="sendMobileCode();" id="sendMobileCode"> <span id="dyMobileButton">获取</span></a>
                </div>
                <div class="user-pass">
                  <label for="password"><i class="am-icon-lock"></i></label> <input type="password" name="password"
                    id="password" placeholder="设置密码">
                </div>
                <div class="user-pass">
                  <label for="passwordRepeat"><i class="am-icon-lock"></i></label> <input type="password"
                    name="repassword" id="passwordRepeat" placeholder="确认密码">
                </div>
                <div class="am-cf">
                  <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                </div>
              </form>
              <hr>
              <p><a href="{{ url('/login') }}">已有账号？现在登录</a></p>
            </div>

            <script>
                  $(function() {
                      $('#doc-my-tabs').tabs();
                    })

                  $('#phone').blur(function(){
                      var phone = $(this).val();  // 手机号码

                      $.post('/register/checkphone', { 'phone' : phone }, function(data){
                           if(data == 1){
                               alert('用户名已存在');
                           }
                      });
                  });

                </script>

          </div>
        </div>

      </div>
    </div>



    <div class="footer ">
      <div class="footer-hd ">
        <p>
          <a href="# ">恒望科技</a> <b>|</b> <a href="# ">商城首页</a> <b>|</b> <a href="# ">支付宝</a> <b>|</b> <a href="# ">物流</a>
        </p>
      </div>
      <div class="footer-bd ">
        <p>
          <a href="# ">关于恒望</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>© 2015-2025
            Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect
            from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
          </em>
        </p>
      </div>
    </div>
    <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function sendMobileCode(){
                // 验证手机号码是否正确
                var phone = $('#phone').val();
            	if (!(/^1[34578]\d{9}$/.test(phone))) {
                    alert("手机号码有误，请重填");
                    return false;
                }

                // 发送手机号码到后台处理
                jQuery.post('/register/sendsms', {phone : phone}, function(data){
                    if (data == 'fail'){
                        alert('验证码发送失败');
                    }

                    //alert('1111');
                    //$('#dyMobileButton').html('60');

                },'json');
            }

            $('#code').blur(function(){
                var inputCode = $('#code').val();
                $.post('/register/checksms', {inputCode : inputCode}, function(data){
                    if(data == 'fail'){
                        alert('你输入的验证码不正确，请重新输入！');
                    }
                });
            });

          </script>

</body>

</html>