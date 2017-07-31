<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>结算页面</title>

    <link href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('home/css/cartstyle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('home/css/jsstyle.css') }}" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="{{ asset('home/js/address.js') }}"></script>

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
            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
          </form>
        </div>
      </div>

      <div class="clear"></div>
      <div class="concent">
        <!--地址 -->
        <div class="paycont">
          <form action="{{ url('/orders') }}" method="post" onSubmit="return doOrders()">
           {{ csrf_field() }}
           <input name="gid" type="hidden" value="{{ $goods->id }}">
           <input name="saler" type="hidden" value="{{ $goods->uid }}">
           <input name="price" type="hidden" value="{{ $goods->price }}">
          <div class="address">
            <h3>确认收货地址 </h3>
            <div class="control">
              <a href="{{ url('person/address') }}"><div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div></a>
            </div>
            <div class="clear"></div>
            <ul>
              @foreach($usersadds as $adds )
                <li><input name="adds" type="radio" value="{{  $adds->id }}" />{{ $adds->name }}&nbsp;&nbsp;{{ $adds->phone }}&nbsp;&nbsp;{{ $adds->province . $adds->city . $adds->county . $adds->info }}</li>
              @endforeach()
            </ul>

            <div class="clear"></div>
          </div>
          <!--物流 -->
          <div class="logistics">
            <h3>选择物流方式</h3>
            <ul class="op_express_delivery_hot">
              <li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
              <li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
              <li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
              <li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
              <li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
            </ul>
          </div>
          <div class="clear"></div>

          <!--支付方式-->
          <div class="logistics">
            <h3>选择支付方式</h3>
            <ul class="pay-list">
              <li class="pay card"><img src="{{ asset('home/images/wangyin.jpg') }}" />银联<span></span></li>
              <li class="pay qq"><img src="{{ asset('home/images/weizhifu.jpg') }}" />微信<span></span></li>
              <li class="pay taobao"><img src="{{ asset('home/images/zhifubao.jpg') }}" />支付宝<span></span></li>
            </ul>
          </div>
          <div class="clear"></div>
              <div class="clear"></div>

              <div class="buy-point-discharge ">
                <p class="price g_price ">
                        合计（含运费） <span>¥</span><em class="pay-sum">{{ $goods->price }}</em>
                </p>
              </div>

              <!--信息 -->
              <div class="order-go clearfix">
                <div class="pay-confirm clearfix">
                  <div id="holyshit269" class="submitOrder">
                    <div class="go-btn-wrap">
                      <button class="am-btn am-btn-danger" type="submit">
                        <i class="icon-ok bigger-110"></i>确定购买
                      </button>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
             </form>
            </div>

            <div class="clear"></div>
          </div>
        </div>
        <div class="footer">
          <div class="footer-bd">
            <p>
              <a href="#">关于恒望</a>
              <a href="#">合作伙伴</a>
              <a href="#">联系我们</a>
              <a href="#">网站地图</a>
              <em>© 2015-2025 Hengwang.com 版权所有. </em>
            </p>
          </div>
        </div>
      </div>
  </body>
</html>
<script>
function  doOrders()
{
	 var list= $('input:radio[name="adds"]:checked').val();
     if(list==null){
         alert("请选择收货地址");
         return false;
     }
     if(prompt('请输入支付密码') != 123456){
    	 alert("支付密码不正确");
         return false;
     }
     return true;
}
</script>