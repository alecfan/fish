<!DOCTYPE html>
<html>

  <head lang="zh-CN">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" />
    <link href="{{ asset('home/css/dlstyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

  </head>

  <body>

    <div class="login-boxtitle">
      <a href="home.html"><img alt="logo" src="{{ asset('home/images/logobig.png') }}" /></a>
    </div>

    <div class="login-banner">
      <div class="login-main">
        <div class="login-banner-bg"><span></span><img src="{{ asset('home/images/big.jpg') }}" /></div>
        <div class="login-box">

              <h3 class="title">登录商城</h3>

              <div class="clear"></div>

            <div class="login-form">
              <form action="{{ url('/login') }}" method="post" id="login">
              {{ csrf_field() }}
                 <div class="user-name">
                    <label for="user"><i class="am-icon-user"></i></label>
                    <input type="text" name="username" id="user" placeholder="邮箱/手机/用户名" data-toggle="popover">
                 </div>
                 <div class="user-pass">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="请输入密码">
                 </div>
               </form>
            </div>

            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
                <a href="#" class="am-fr">忘记密码</a>
                <a href="{{ url('register') }}" class="zcnext am-fr am-btn-default">注册</a>
                <br />
            </div>
            <div class="am-cf">
              <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm" form="login">
            </div>

            <div class="partner">
              @if (session('status'))
              <p style="color:red">
                {{ session('status') }}
              @endif
              </p>
            </div>

        </div>
      </div>
    </div>


          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">恒望科技</a>
                <b>|</b>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于恒望</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 lamp184 版权所有</em>
              </p>
            </div>
          </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script>
        $(function () {
      	   $('[data-toggle="popover"]').popover()
      	})

        $('#user').focus(function(){
        	if(this.value.length < 1){
//           	   $('#user').attr({
//           		        'data-placement' : "top",
//                         'data-content' : "账号长度应在1到32个字符之间"
//                      }).popover('show');
        		$('#user').popover({
                      'trigger':'click',
  		              'placement' : "top",
                      'content' : "账号长度应在1到32个字符之间"
                  }).popover('show');
             }
        })

        $('#user').blur(function(){
        	$('#user').removeAttr('data-placement');
        	$('#user').removeAttr('data-content');
        })

        $('#password').blur(function(){
            //alert(this.value.length);
            if(this.value.length < 6){
         	   $('#password').attr({
         		      'data-toggle' : "popover",
         		      'data-placement' : "bottom",
                       'data-content' : "密码长度应在6到32个字符之间"
                    }).popover('toggle');
            }
         });
    </script>
  </body>

</html>