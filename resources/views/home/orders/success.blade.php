<!DOCTYPE html>
<?php
date_default_timezone_set("PRC");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>付款成功页面</title>
<link rel="stylesheet"  type="text/css" href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}"/>
<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('home/css/sustyle.css') }}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{ asset('home/basic/js/jquery-1.7.min.js') }}"></script>

</head>

<body>


<!--顶部导航条 -->
<div class="am-container header">

</div>

<!--悬浮搜索框-->

<div class="nav white">
	<div class="logo"><img src="{{ asset('home/images/logo.png') }}" /></div>
    <div class="logoBig">
      <li><img src="{{ asset('home/images/logobig.png') }}" /></li>
    </div>

    <div class="search-bar pr">
        <a name="index_none_header_sysc" href="#"></a>
        <form>
        <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
        <input id="ai-topsearch" class="submit" value="搜索" index="1" type="submit"></form>
    </div>
</div>

<div class="clear"></div>



<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>{{ $order['price'] }}</em></li>
       <div class="user-info">
         <p>{{ date('Y-m-d H:i:s',time()) }}</p>
         <p>订单编号：{{ $order['orderid'] }}</p>
         <p>成交时间：{{ date("Y-m-d H:i:s",$order['addtime']) }}</p>
         <p>收货人：{{ $order['name'] }}</p>
         <p>联系电话：{{ $order['phone'] }}</p>
         <p>收货地址：{{ $order['address'] }}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服

     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="{{ url('buy') }}" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="{{ url('') }}" class="J_MakePoint">查看<span>更多商品</span></a>
     </div>
    </div>
  </div>
</div>


<div class="footer" >
 <div class="footer-hd">
 <p>
 <a href="#">恒望科技</a>
 <b>|</b>
 <a href="#">商城首页</a>
 <b>|</b>
 <a href="#">支付宝</a>
 <b>|</b>
 <a href="#">物流</a>
 </p>
 </div>
 <div class="footer-bd">
 <p>
 <a href="#">关于恒望</a>
 <a href="#">合作伙伴</a>
 <a href="#">联系我们</a>
 <a href="#">网站地图</a>
 <em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
 </p>
 </div>
</div>


</body>
</html>
