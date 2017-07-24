@extends('home.person.parent') {{-- 个人信息页css --}} @section('content')
    <link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset('home/css/personal.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('home/css/orstyle.css')}}" rel="stylesheet" type="text/css">

    <script src="{{ asset ('home/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset ('home/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>


          <div class="user-orderinfo">

            <!--标题 -->
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
              <div class="m-progress-list">
                <span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
                <span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
                <span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
                <span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
                <span class="u-progress-placeholder"></span>
              </div>
              <div class="u-progress-bar total-steps-2">
                <div class="u-progress-bar-inner"></div>
              </div>
            </div>
            <div class="order-infoaside">

              <div class="order-logistics">
                <a href="logistics.html">
                  <div class="icon-log">
                    <i><img src="{{ asset('home/images/receive.png')}}"></i>
                  </div>
                  <div class="latest-logistics">
                    <p class="text">已签收,签收人是青年城签收，感谢使用天天快递，期待再次为您服务</p>
                    <div class="time-list">
                      <span class="date">2015-12-19</span><span class="week">周六</span><span class="time">15:35:42</span>
                    </div>
                    <div class="inquire">
                      <span class="package-detail">物流：XX快递</span>
                      <span class="package-detail">订单号: </span>
                      <span class="package-number">{{ $list->orderid }}</span>
                      <a href="">查看</a>
                    </div>
                  </div>
                  <span class="am-icon-angle-right icon"></span>
                </a>
                <div class="clear"></div>
              </div>

              <div class="order-addresslist">
                <div class="order-address">
                  <div class="icon-add">
                  </div>
                  <p class="new-tit new-p-re">
                    <span class="title">收货地址：</span>
                    <span class="new-txt-rd2">{{ $list->address }}</span>
                  </p>
                  <div class="new-mu_l2a new-p-re">
                    <p class="new-mu_l2cw">
                      <span class="title">联系电话：</span>
                      <span class="province">{{ $list->phone }}</span>
                     </p>
                      <p class="new-mu_l2cw">
                      <span class="title">收货人姓名：</span>
                      <span class="province">{{ $list->name }}</span>
                     </p>
                  </div>
                </div>
              </div>
            </div>

          </div>



@endsection
