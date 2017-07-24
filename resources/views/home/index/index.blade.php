@extends('home.parent')
{{-- 页面标题 --}}
@section('title')
淡定龟二手交易网
@endsection

{{-- 页面指定CSS --}}
@section('specifiedCSS')
<link href="{{ asset('home/css/hmstyle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('home/css/skin.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- 页面指定JS --}}
@section('specifiedJS')
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.min.js') }}"></script>
@endsection


@section('content')
<div class="banner">
    <!--轮播 -->
    <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
      <ul class="am-slides">
        <li class="banner1"><a><img src="{{ asset('home/images/ad1.jpg') }}" /></a></li>
        <li class="banner2"><a><img src="{{ asset('home/images/ad2.jpg') }}" /></a></li>
        <li class="banner3"><a><img src="{{ asset('home/images/ad3.jpg') }}" /></a></li>
        <li class="banner4"><a><img src="{{ asset('home/images/ad4.jpg') }}" /></a></li>
      </ul>
    </div>
    <div class="clear"></div>
</div>

  <!--分类，导航-->
  <div class="shopNav">
    <div class="slideall">
      <div class="long-title">
        <span class="all-goods">全部分类</span>
      </div>
      <div class="nav-cont">
        <ul>
          <li class="index"><a href="{{ url('/') }}">首页</a></li>
          <li class="qc">
          @if(session('username'))
            <a href="{{ url('person/goods/create') }}">发布闲置</a></li>
          @else
            <a href="{{ url('/login') }}">发布闲置</a></li>
          @endif
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
                                <span>{{ $key2 }}</span>
                              </dt>
                              @foreach($value2 as $key3=>$value3)
                              <dd>
                                <a href="{{ url('/search/tid/' . $value3->id) }}"><span>{{ $value3->tname }}</span></a>
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
            <h4>热门拍卖</h4>
            <div class="today-brands">
              <a href="# ">桂花糕</a>
            </div>
            <span class="more ">
              <a href="# ">更多拍卖<i class="am-icon-angle-right" style="padding-left: 10px;"></i></a>
            </span>
          </div>
        </div>

        <div class="am-g am-g-fixed floodFour">
            <!-- 遍历商品开始 -->
          @foreach($auction as $auctioninfo)
          <div class="am-u-sm-7 am-u-md-4 text-two" style="float: left">
            <div class="outer-con ">
              <div class="title ">{{ $auctioninfo->title }}</div>
              <div class="sub-title ">{{ $auctioninfo->price }}</div>
              <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
            </div>
            <a href="{{ url() }}"><img src="{{ asset('home/images/' . $auctioninfo->picname) }}"></a>
          </div>
          @endforeach
            <!-- 遍历商品结束 -->
        </div>
        <div class="clear "></div>
      </div>
    <!-- 母婴栏目结束 -->
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
          <div class="am-u-sm-7 am-u-md-4 text-two" style="float: left">
            <div class="outer-con ">
              <div class="title ">{{ $muyinGood->title }}</div>
              <div class="sub-title ">¥{{ $muyinGood->price }}</div>
              <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
            </div>
            <a href="{{ url('/goods/' . $muyinGood->id) }}"><img src="{{ asset('home/images/' . $muyinGood->picname) }}"></a>
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

@endsection


{{-- 页面指定行内JS --}}
@section('specifiedInnerJS')
 <script>
      window.jQuery || document.write('<script src="{{ asset('home/basic/js/jquery.min.js') }}"><\/script>');
    </script>
  <script type="text/javascript " src="{{ asset('home/basic/js/quick_links.js') }}"></script>
@endsection

<script>
@if (session('update'))
alert("{{ session('update') }}");
@endif
</script>