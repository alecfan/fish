<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

<title>个人中心</title>

<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/css/personal.css') }}" rel="stylesheet" type="text/css">

{{-- 个人信息页样式 --}}
@yield('editInfoCSS')

{{-- 个人中心首页样式 --}}
@yield('showIndexCSS')

{{-- 收货地址页样式 --}}
@yield('showAddCSS')

<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.js') }}" type="text/javascript"></script>

</head>

<body>
  <!--头 -->
  @include('home.header')

  <div class="nav-table">
    <div class="long-title">
      <span class="all-goods">全部分类</span>
    </div>
    <div class="nav-cont">
      <ul>
        <li class="index"><a href="{{ url('/') }}">首页</a></li>
        <li class="qc"><a href="{{ url('person/goods/create') }}">发布闲置</a></li>
        <li class="qc last"><a href="{{ url('person') }}">我的闲置</a></li>
      </ul>
    </div>
  </div>


  <b class="line"></b>
  <div class="center">
    <div class="col-main">
      <div class="main-wrap">
        {{-- 页面主体 --}}
        @yield('content')
      </div>
      <!--底部-->
      <div class="footer">
        <div class="footer-hd">
          <p>
            <a href="#">恒望科技</a> <b>|</b> <a href="#">商城首页</a> <b>|</b> <a href="#">支付宝</a> <b>|</b> <a href="#">物流</a>
          </p>
        </div>
        <div class="footer-bd">
          <p>
            <a href="#">关于恒望</a> <a href="#">合作伙伴</a> <a href="#">联系我们</a> <a href="#">网站地图</a> <em>© 2015-2025
              Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect
              from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
            </em>
          </p>
        </div>
      </div>

    </div>

    <aside class="menu">
      <ul>
        <li class="person @yield('indexActive')"><a href="{{ url('person') }}">个人中心</a></li>
        <li class="person">个人资料
          <ul>
            <li class="@yield('infoActive')"><a href="{{ url('person/info') }}">我的资料</a></li>
            <li class="@yield('addActive')"><a href="{{ url('person/address') }}">收货地址</a></li>
          </ul></li>
        <li class="person">我的交易
          <ul>
            <li><a href="order.html">我发布的</a></li>
            <li><a href="order.html">我卖出的</a></li>
            <li><a href="order.html">我买到的</a></li>
            <li><a href="order.html">我收藏的</a></li>
            <li><a href="order.html">我的拍卖</a></li>
          </ul></li>
        <li class="person">我的小窝
          <ul>
            <li><a href="collection.html">收藏</a></li>
            <li><a href="foot.html">足迹</a></li>
            <li><a href="comment.html">评价</a></li>
            <li><a href="news.html">消息</a></li>
          </ul></li>
      </ul>

    </aside>
  </div>
</body>

</html>