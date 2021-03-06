@extends('home.person.parent')

{{-- 个人中心首页样式 --}}
@section('showIndexCSS')
<link href="{{ asset('home/css/systyle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('indexActive')
active
@endsection

{{-- 页面主体 --}}
@foreach($list as $v)
@section('content')
<div class="wrap-left">
  <div class="wrap-list">
    <div class="m-user">
      <!--个人信息 -->
      <div class="m-bg"></div>
      <div class="m-userinfo">
        <div class="m-baseinfo">
          <a href="/person/info"> <img src="{{ url('/home/upload/'.$v->photo) }}">
          </a> <em class="s-name">{{ $v->username }}<span class="vip1"></em>
          <div class="s-prestige am-btn am-round">
            </span>会员福利
          </div>
        </div>
        <div class="m-right">
          <div class="m-new">
            <a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
          </div>
          <div class="m-address">
            <a href="{{ url('person/address') }}" class="i-trigger">我的收货地址</a>
          </div>
        </div>
      </div>
    </div>


    <!--订单 -->
    <div class="m-order">
      <div class="s-bar">
        <i class="s-icon"></i>我的订单 <a class="i-load-more-item-shadow" href="order.html">全部订单</a>
      </div>
      <ul>
        <li><a href="order.html"><i><img src="{{ asset('home/images/pay.png') }}" /></i><span>待付款</span></a></li>
        <li><a href="order.html"><i><img src="{{ asset('home/images/send.png') }}" /></i><span>待发货<em class="m-num">1</em></span></a></li>
        <li><a href="order.html"><i><img src="{{ asset('home/images/receive.png') }}" /></i><span>待收货</span></a></li>
        <li><a href="order.html"><i><img src="{{ asset('home/images/comment.png') }}" /></i><span>待评价<em class="m-num">3</em></span></a></li>
        <li><a href="change.html"><i><img src="{{ asset('home/images/refund.png') }}" /></i><span>退换货</span></a></li>
      </ul>
    </div>
    <div class="box-container-bottom"></div>
    <!--九宫格-->
    <div class="user-patternIcon">
      <div class="s-bar">
        <i class="s-icon"></i>我的常用
      </div>
      <ul>

        <a href="../home/shopcart.html"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img
            src="{{ asset('home/images/iconbig.png') }}" />
            <p>购物车</p></li></a>
        <a href="collection.html"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img
            src="{{ asset('home/images/iconsmall1.png') }}" />
            <p>我的收藏</p></li></a>
        <a href="../home/home.html"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img
            src="{{ asset('home/images/iconsmall0.png') }}" />
            <p>为你推荐</p></li></a>
        <a href="comment.html"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img
            src="{{ asset('home/images/iconsmall3.png') }}" />
            <p>好评宝贝</p></li></a>
        <a href="foot.html"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img
            src="{{ asset('home/images/iconsmall2.png') }}" />
            <p>我的足迹</p></li></a>
      </ul>
    </div>
    <!--物流 -->
    <div class="m-logistics">

      <div class="s-bar">
        <i class="s-icon"></i>我的物流
      </div>
      <div class="s-content">
        <ul class="lg-list">

          <li class="lg-item">
            <div class="item-info">
              <a href="#"> <img src="{{ asset('home/images/65.jpg_120x120xz.jpg') }}" alt="抗严寒冬天保暖隔凉羊毛毡底鞋垫超薄0.35厘米厚吸汗排湿气舒适">
              </a>

            </div>
            <div class="lg-info">

              <p>快件已从 义乌 发出</p>
              <time>2015-12-20 17:58:05</time>

              <div class="lg-detail-wrap">
                <a class="lg-detail i-tip-trigger" href="logistics.html">查看物流明细</a>
                <div class="J_TipsCon hide">
                  <div class="s-tip-bar">中通快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：373269427686</div>
                  <div class="s-tip-content">
                    <ul>
                      <li>快件已从 义乌 发出2015-12-20 17:58:05</li>
                      <li>义乌 的 义乌总部直发车 已揽件2015-12-20 17:54:49</li>
                      <li class="s-omit"><a data-spm-anchor-id="a1z02.1.1998049142.3" target="_blank" href="#">··· 查看全部</a></li>
                      <li>您的订单开始处理2015-12-20 08:13:48</li>

                    </ul>
                  </div>
                </div>
              </div>

            </div>
            <div class="lg-confirm">
              <a class="i-btn-typical" href="#">确认收货</a>
            </div>
          </li>
          <div class="clear"></div>

          <li class="lg-item">
            <div class="item-info">
              <a href="#"> <img src="{{ asset('home/images/88.jpg_120x120xz.jpg') }}" alt="礼盒袜子女秋冬 纯棉袜加厚 女式中筒袜子 韩国可爱 女袜 女棉袜">
              </a>

            </div>
            <div class="lg-info">

              <p>已签收,签收人是青年城签收</p>
              <time>2015-12-19 15:35:42</time>

              <div class="lg-detail-wrap">
                <a class="lg-detail i-tip-trigger" href="logistics.html">查看物流明细</a>
                <div class="J_TipsCon hide">
                  <div class="s-tip-bar">天天快递&nbsp;&nbsp;&nbsp;&nbsp;运单号：666287461069</div>
                  <div class="s-tip-content">
                    <ul>

                      <li>已签收,签收人是青年城签收2015-12-19 15:35:42</li>
                      <li>【光谷关山分部】的派件员【关山代派】正在派件 电话:*2015-12-19 14:27:28</li>
                      <li class="s-omit"><a data-spm-anchor-id="a1z02.1.1998049142.7" target="_blank"
                        href="//wuliu.taobao.com/user/order_detail_new.htm?spm=a1z02.1.1998049142.7.8BJBiJ&amp;trade_id=1479374251166800&amp;seller_id=1651462988&amp;tracelog=yimaidaologistics">···
                          查看全部</a></li>
                      <li>您的订单开始处理2015-12-17 14:27:50</li>

                    </ul>
                  </div>
                </div>
              </div>

            </div>
            <div class="lg-confirm">
              <a class="i-btn-typical" href="#">确认收货</a>
            </div>
          </li>

        </ul>

      </div>
@endforeach
    </div>

    <!--收藏夹 -->
    <div class="you-like">
      <div class="s-bar">
        我的收藏 <a class="am-badge am-badge-danger am-round">降价</a> <a class="am-badge am-badge-danger am-round">下架</a> <a
          class="i-load-more-item-shadow" href="#"><i class="am-icon-refresh am-icon-fw"></i>换一组</a>
      </div>
      <div class="s-content">
              @foreach($collects as $collect)
                <div class="s-item-wrap">
                  <div class="s-item">
                    <div class="s-pic">
                      <a href="{{ url('/goods/' . $collect->goodid) }}" class="s-pic-link">
                        <img height="150" src="{{ asset('home/images/' . $collect->picname) }}" alt="{{ $collect->title }}" title="{{ $collect->title }}" class="s-pic-img s-guess-item-img" >
                      </a>
                    </div>
                    <div class="s-info">
                      <div class="s-title"><a href="#" title="{{ $collect->title }}">{{ $collect->title }}</a></div>
                      <div class="s-price-box">
                        <span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{ $collect->price }}</em></span>
                        <span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">68.00</em></span>
                      </div>
                      <div class="s-extra-box">
                        <span class="s-comment">好评: 98.03%</span>
                        <a class="am-badge am-badge-danger am-round cancelCollect" gid="{{ $collect->goodid }}">取消收藏</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>

      <div class="s-more-btn i-load-more-item" data-screen="0">
        <i class="am-icon-refresh am-icon-fw"></i>更多
      </div>

    </div>

  </div>
</div>
<div class="wrap-right">

  <!-- 日历-->
  <div class="day-list">
    <div class="s-bar">
      <a class="i-history-trigger s-icon" href="#"></a>我的日历 <a class="i-setting-trigger s-icon" href="#"></a>
    </div>
    <div class="s-care s-care-noweather">
      <div class="s-date">
        <em>{{ date('d') }}</em> <span>星期一</span> <span>{{ date('Y.m') }}</span>
      </div>
    </div>
  </div>
  <!--新品 -->
  <div class="new-goods">
    <div class="s-bar">
      <i class="s-icon"></i>今日新品 <a class="i-load-more-item-shadow">15款新品</a>
    </div>
    <div class="new-goods-info">
      <a class="shop-info" href="#" target="_blank">
        <div class="face-img-panel">
          <img src="{{ asset('home/images/imgsearch1.jpg') }}" alt="">
        </div> <span class="new-goods-num ">4</span> <span class="shop-title">剥壳松子</span>
      </a> <a class="follow " target="_blank">关注</a>
    </div>
  </div>

  <!--热卖推荐 -->
  <div class="new-goods">
    <div class="s-bar">
      <i class="s-icon"></i>热卖推荐
    </div>
    <div class="new-goods-info">
      <a class="shop-info" href="#" target="_blank">
        <div>
          <img src="{{ asset('home/images/imgsearch1.jpg') }}" alt="">
        </div> <span class="one-hot-goods">￥9.20</span>
      </a>
    </div>
  </div>

</div>

@endsection
