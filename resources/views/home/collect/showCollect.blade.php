@extends('home.person.parent')

{{-- 页面样式 --}}
@section('showCollectCSS')
  <link href="{{ asset('home/css/colstyle.css') }}" rel="stylesheet" type="text/css">
@endsection

{{-- 侧边菜单选中 --}}
@section('collectActive')
  active
@endsection

{{-- 页面主体样式 --}}
@section('content')


          <div class="user-collection">
            <!--标题 -->
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
            </div>
            <hr>

            <div class="you-like">
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
            </div>
          </div>

          <script>


              $('.cancelCollect').click(function(){
            	  var gid = $(this).attr('gid');
                  var collect = $(this);
            	  $.post("/cancelcollect", {gid : gid, uid : "{{ session('userid') }}" }, function(data){
                      if (data == '1'){
                    	  collect.parents('div.s-item-wrap').remove();
                      }
                  });
              })
          </script>
@endsection