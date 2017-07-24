@extends('home.person.parent')

@section('footActive') active @endsection

@section('specifiedCSS')
<link href="{{ asset('home/css/footstyle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="user-foot">
            <!--标题 -->
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
            </div>
            <hr/>

            <!--足迹列表 -->
           @if(isset($goods['todayGoods']))
            @foreach($goods['todayGoods'] as $todayGood)
            <div class="goods">
              <div class="goods-date" data-date="2015-12-21">
                <span><i class="month-lite">{{ date('m') }}</i>.<i class="day-lite">{{ date('d') }}</i><i class="date-desc">今天</i></span>
                <del class="am-icon-trash"></del>
                <s class="line"></s>
              </div>

              <div class="goods-box first-box">
                <div class="goods-pic">
                  <div class="goods-pic-box">
                    <a class="goods-pic-link" target="_blank" href="{{ url('/goods/' . $todayGood->id) }}">
                      <img src="{{ asset('home/images/' . $todayGood->picname) }}" class="goods-img"></a>
                  </div>
                  <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                </div>

                <div class="goods-attr">
                  <div class="good-title">
                    <a class="title" href="#" target="_blank">{{ $todayGood->title }}</a>
                  </div>
                  <div class="goods-price">
                    <span class="g_price">
                                        <span>¥</span><strong>{{ $todayGood->price }}</strong>
                    </span>
                    <span class="g_price g_price-original">
                                        <span>¥</span><strong>142</strong>
                    </span>
                  </div>
                  <div class="clear"></div>
                  <div class="goods-num">
                    <div class="match-recom">
                      <a href="#" class="match-recom-item">找相似</a>
                      <a href="#" class="match-recom-item">找搭配</a>
                      <i><em></em><span></span></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              @endforeach
@endif
          <div class="clear"></div>

    @if(isset($goods['lastweekGoods']))
      @foreach($goods['lastweekGoods'] as $lastweekGood)
            <div class="goods">
              <div class="goods-date" data-date="2015-12-17">
                <span><i class="month-lite"></i><i class="day-lite"></i>  <i class="date-desc">一周内</i></span>
                <del class="am-icon-trash"></del>
                <s class="line"></s>
              </div>
              <div class="goods-box">
                <div class="goods-pic">
                  <div class="goods-pic-box">
                    <a class="goods-pic-link" target="_blank" href="{{ url('/goods/' . $lastweekGood->id) }}">
                      <img src="{{ asset('home/images/' . $lastweekGood->picname) }}" class="goods-img"></a>
                  </div>
                  <a class="goods-delete" href="javascript:void(0);"><i class="am-icon-trash"></i></a>
                </div>

                <div class="goods-attr">
                  <div class="good-title">
                    <a class="title" href="#" target="_blank">{{ $lastweekGood->title }}</a>
                  </div>
                  <div class="goods-price">
                    <span class="g_price">
                                        <span>¥</span><strong>{{ $lastweekGood->price }}</strong>
                    </span>
                    <span class="g_price g_price-original">
                                        <span>¥</span><strong>142</strong>
                    </span>
                  </div>
                  <div class="clear"></div>
                  <div class="goods-num">
                    <div class="match-recom">
                      <a href="#" class="match-recom-item">找相似</a>
                      <a href="#" class="match-recom-item">找搭配</a>
                      <i><em></em><span></span></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
@endif
          </div>
@endsection