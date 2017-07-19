<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >
<title>首页</title>
<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/css/hmstyle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/css/skin.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.min.js') }}"></script>
</head>

<body>

@include('home.header')

  <div class="shopNav">
    <div class="slideall">
      <div class="long-title">
        <span class="all-goods">全部分类</span>
      </div>
      <div class="nav-cont">
        <ul>
          <li class="index"><a href="#">首页</a></li>
          <li class="qc"><a href="{{ url('person/goods/create') }}">发布闲置</a></li>
          <li class="qc last">
          @if(session('username'))
            <a href="{{ url('person') }}">我的闲置</a>
          @else
            <a href="{{ url('/login') }}">我的闲置</a>
          @endif
          </li>
        </ul>
      </div>

      <!--侧边导航 -->
      <div id="nav" class="navfull">
        <div class="area clearfix">
          <div class="category-content" id="guide_2">
            <div class="category">
              <ul class="category-list" id="js_climit_li">
                @foreach($data as $key1 => $value1)
                <li class="appliance js_toggle relative first">
                  <div class="category-info">
                    <h3 class="category-name b-category-name">
                      <i><img src="{{ asset('home/images/cake.png')}}"></i><a class="ml-22" title="点心">{{ $key1 }}</a>
                    </h3>
                    <em>&gt;</em>
                  </div>
                  <div class="menu-item menu-in top">
                    <div class="area-in">
                      <div class="area-bg">
                        <div class="menu-srot">
                          <div class="sort-side">
                            @foreach($value1 as $key2=>$value2)
                            <dl class="dl-sort">
                              <dt>
                                <span title="蛋糕">{{ $key2 }}</span>
                              </dt>
                              @foreach($value2 as $key3=>$value3)
                              <dd>
                                <a title="蒸蛋糕" href="#"><span>{{ $value3->tname }}</span></a>
                              </dd>
                              @endforeach
                            </dl>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> <b class="arrow"></b>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!--轮播-->
      <script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



      <!--小导航 -->
      <div class="am-g am-g-fixed smallnav">
        <div class="am-u-sm-3">
          <a href="sort.html"><img src="{{ asset('home/images/navsmall.jpg') }}" />
            <div class="title">商品分类</div> </a>
        </div>
        <div class="am-u-sm-3">
          <a href="#"><img src="{{ asset('home/images/huismall.jpg') }}" />
            <div class="title">大聚惠</div> </a>
        </div>
        <div class="am-u-sm-3">
          <a href="#"><img src="{{ asset('home/images/mansmall.jpg') }}" />
            <div class="title">个人中心</div> </a>
        </div>
        <div class="am-u-sm-3">
          <a href="#"><img src="{{ asset('home/images/moneysmall.jpg') }}" />
            <div class="title">投资理财</div> </a>
        </div>
      </div>

      <!--走马灯 -->

      <div class="marqueen">
        <span class="marqueen-title">商城头条</span>
        <div class="demo">

          <ul>
            <li class="title-first"><a target="_blank" href="#"> <img src="{{ asset('home/images/TJ2.jpg') }}"></img> <span>[特惠]</span>商城爆品1分秒
            </a></li>
            <li class="title-first"><a target="_blank" href="#"> <span>[公告]</span>商城与广州市签署战略合作协议 <img
                src="{{ asset('home/images/TJ.jpg') }}"></img>
                <p>XXXXXXXXXXXXXXXXXX</p>
            </a></li>

            <div class="mod-vip">
              @if(!session('username'))
              <div class="m-baseinfo">
                <a href="person/index.html"> <img src="{{ asset('home/images/getAvatar.do.jpg') }}"></a>
                <em> Hi,<span class="s-name">小叮当</span></em>
                <div class="member-logout">
                  <a class="am-btn-warning btn" href="{{ url('/login') }}">登录</a>
                  <a class="am-btn-warning btn" href="{{ url('/register') }}">注册</a>
                </div>
              </div>
              @else
              <div class="m-baseinfo">
                <a href=""><img src="{{ asset('home/images/getAvatar.do.jpg') }}"></a>
                <em> Hi,<span class="s-name">{{ session('username') }}</span></em>
                <div class="member-logout">
                  <a class="am-btn-warning btn" href="{{ url('/logout') }}">注销</a>
                </div>
              </div>
              @endif
              <div class="clear"></div>
            </div>
          </ul>
          <div class="advTip">
            <img src="{{ asset('home/images/advTip.jpg') }}" />
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
  </div>
  <div class="shopMainbg">
    <div class="shopMain" id="shopmain">

      <!--今日推荐 -->

      <div class="am-g am-g-fixed recommendation">
        <div class="clock am-u-sm-3"">
          <img src="{{ asset('home/images/2016.png') }}"></img>
          <p>
            今日<br>推荐

          </p>
        </div>
        <div class="am-u-sm-4 am-u-lg-3 ">
          <div class="info ">
            <h3>真的有鱼</h3>
            <h4>开年福利篇</h4>
          </div>
          <div class="recommendationMain one">
            <a href="introduction.html"><img src="{{ asset('home/images/tj.png') }}"></img></a>
          </div>
        </div>
        <div class="am-u-sm-4 am-u-lg-3 ">
          <div class="info ">
            <h3>囤货过冬</h3>
            <h4>让爱早回家</h4>
          </div>
          <div class="recommendationMain two">
            <img src="{{ asset('home/images/tj1.png') }}"></img>
          </div>
        </div>
        <div class="am-u-sm-4 am-u-lg-3 ">
          <div class="info ">
            <h3>浪漫情人节</h3>
            <h4>甜甜蜜蜜</h4>
          </div>
          <div class="recommendationMain three">
            <img src="{{ asset('home/images/tj2.png') }}"></img>
          </div>
        </div>

      </div>
      <div class="clear "></div>

      <div id="f1">
      <!-- 母婴栏目开始 -->
        <div class="am-container ">
          <div class="shopTitle ">
            <h4>辣妈爱萌宝</h4>
            <div class="today-brands">
              <a href="# ">桂花糕</a>
            </div>
            <span class="more ">
              <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>
            </span>
          </div>
        </div>

        <div class="am-g am-g-fixed floodFour">
            <!-- 遍历商品开始 -->
          @foreach($muyinGoods as $muyinGood)
          <div class="am-u-sm-7 am-u-md-4 text-two">
            <div class="outer-con ">
              <div class="title ">{{ $muyinGood->title }}</div>
              <div class="sub-title ">¥{{ $muyinGood->price }}</div>
              <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
            </div>
            <a href="# "><img src="{{ asset('home/images/' . $muyinGood->picname) }}"></a>
          </div>
          @endforeach
            <!-- 遍历商品结束 -->
        </div>
        <div class="clear "></div>
      </div>
    <!-- 母婴栏目结束 -->

      <div id="f2">
        <!-- 摄影栏目 -->
        <div class="am-container ">
          <div class="shopTitle ">
            <h4>爱摄影≠穷三代</h4>
            <div class="today-brands ">
              <a href="# ">腰果</a>
            </div>
            <span class="more "> <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>
            </span>
          </div>
        </div>
        <div class="am-g am-g-fixed floodThree ">
        <!-- 遍历商品 -->
          <div class="am-u-sm-4 text-four">
            <a href="# "> <img src="{{ asset('home/images/6.jpg') }}" />
              <div class="outer-con ">
                <div class="title ">雪之恋和风大福</div>
                <div class="sub-title ">¥13.8</div>
                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
              </div>
            </a>
          </div>
        <!-- 遍历商品结束 -->
        </div>

        <div class="clear "></div>
      </div>


      <div id="f3">
        <!--甜点-->

        <div class="am-container ">
          <div class="shopTitle ">
            <h4>再见老乔，我还是果粉</h4>
            <div class="today-brands ">
              <a href="# ">桂花糕</a>
            </div>
            <span class="more "> <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>
            </span>
          </div>
        </div>

        <div class="am-g am-g-fixed floodFour">
<!-- 遍历商品开始 -->
          <div class="am-u-sm-7 am-u-md-4 text-two">
            <div class="outer-con ">
              <div class="title ">雪之恋和风大福</div>
              <div class="sub-title ">¥13.8</div>
              <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
            </div>
            <a href="# "><img src="http://fish.com/home/images/1.jpg"></a>
          </div>

        </div>
        <div class="clear "></div>
      </div>
<!-- 遍历商品结束 -->

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

    </div>
  </div>
  <!--引导 -->
  <div class="navCir">
    <li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
    <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
    <li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>
  </div>


  <!--菜单 -->
  <div class=tip>
    <div id="sidebar">
      <div id="wrap">
        <div id="prof" class="item ">
          <a href="# "> <span class="setting "></span>
          </a>
          <div class="ibar_login_box status_login ">
            <div class="avatar_box ">
              <p class="avatar_imgbox ">
                <img src="{{ asset('home/images/no-img_mid_.jpg') }}" />
              </p>
              <ul class="user_info ">
                <li>用户名sl1903</li>
                <li>级&nbsp;别普通会员</li>
              </ul>
            </div>
            <div class="login_btnbox ">
              <a href="# " class="login_order ">我的订单</a> <a href="# " class="login_favorite ">我的收藏</a>
            </div>
            <i class="icon_arrow_white "></i>
          </div>

        </div>
        <div id="shopCart " class="item ">
          <a href="# "> <span class="message "></span>
          </a>
          <p>购物车</p>
          <p class="cart_num ">0</p>
        </div>
        <div id="asset " class="item ">
          <a href="# "> <span class="view "></span>
          </a>
          <div class="mp_tooltip ">
            我的资产 <i class="icon_arrow_right_black "></i>
          </div>
        </div>

        <div id="foot " class="item ">
          <a href="# "> <span class="zuji "></span>
          </a>
          <div class="mp_tooltip ">
            我的足迹 <i class="icon_arrow_right_black "></i>
          </div>
        </div>

        <div id="brand " class="item ">
          <a href="#"> <span class="wdsc "><img src="{{ asset('home/images/wdsc.png') }}" /></span>
          </a>
          <div class="mp_tooltip ">
            我的收藏 <i class="icon_arrow_right_black "></i>
          </div>
        </div>

        <div id="broadcast " class="item ">
          <a href="# "> <span class="chongzhi "><img src="{{ asset('home/images/chongzhi.png') }}" /></span>
          </a>
          <div class="mp_tooltip ">
            我要充值 <i class="icon_arrow_right_black "></i>
          </div>
        </div>

        <div class="quick_toggle ">
          <li class="qtitem "><a href="# "><span class="kfzx "></span></a>
            <div class="mp_tooltip ">
              客服中心<i class="icon_arrow_right_black "></i>
            </div></li>
          <!--二维码 -->
          <li class="qtitem "><a href="#none "><span class="mpbtn_qrcode "></span></a>
            <div class="mp_qrcode " style="display: none;">
              <img src="{{ asset('home/images/weixin_code_145.png') }}" /><i class="icon_arrow_white "></i>
            </div></li>
          <li class="qtitem "><a href="#top " class="return_top "><span class="top "></span></a></li>
        </div>

        <!--回到顶部 -->
        <div id="quick_links_pop " class="quick_links_pop hide "></div>

      </div>

    </div>
    <div id="prof-content " class="nav-content ">
      <div class="nav-con-close ">
        <i class="am-icon-angle-right am-icon-fw "></i>
      </div>
      <div>我</div>
    </div>
    <div id="shopCart-content " class="nav-content ">
      <div class="nav-con-close ">
        <i class="am-icon-angle-right am-icon-fw "></i>
      </div>
      <div>购物车</div>
    </div>
    <div id="asset-content " class="nav-content ">
      <div class="nav-con-close ">
        <i class="am-icon-angle-right am-icon-fw "></i>
      </div>
      <div>资产</div>

      <div class="ia-head-list ">
        <a href="# " target="_blank " class="pl ">
          <div class="num ">0</div>
          <div class="text ">优惠券</div>
        </a> <a href="# " target="_blank " class="pl ">
          <div class="num ">0</div>
          <div class="text ">红包</div>
        </a> <a href="# " target="_blank " class="pl money ">
          <div class="num ">￥0</div>
          <div class="text ">余额</div>
        </a>
      </div>

    </div>
    <div id="foot-content " class="nav-content ">
      <div class="nav-con-close ">
        <i class="am-icon-angle-right am-icon-fw "></i>
      </div>
      <div>足迹</div>
    </div>
    <div id="brand-content " class="nav-content ">
      <div class="nav-con-close ">
        <i class="am-icon-angle-right am-icon-fw "></i>
      </div>
      <div>收藏</div>
    </div>
    <div id="broadcast-content " class="nav-content ">
      <div class="nav-con-close ">
        <i class="am-icon-angle-right am-icon-fw "></i>
      </div>
      <div>充值</div>
    </div>
  </div>
  <script>
			window.jQuery || document.write('<script src="{{ asset('home/basic/js/jquery.min.js') }}"><\/script>');
		</script>
  <script type="text/javascript " src="{{ asset('home/basic/js/quick_links.js') }}"></script>
</body>

</html>