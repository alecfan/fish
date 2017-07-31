@extends('home.parent')

{{-- 页面标题 --}}
@section('title')
商品详情页面
@endsection

{{-- 页面指定CSS --}}
@section('specifiedCSS')
<link type="text/css" href="{{ asset('home/css/optstyle.css') }}" rel="stylesheet" />
<link type="text/css" href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
@endsection

{{-- 页面指定JS --}}
@section('specifiedJS')
<script src="{{ asset('home/basic/js/jquery-1.7.min.js') }}"></script>
<script src="{{ asset('home/basic/js/quick_links.js') }}"></script>
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.js') }}"></script>
<script src="{{ asset('home/js/jquery.imagezoom.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('home/js/list.js') }}"></script>
@endsection

{{-- 页面主体内容 --}}
@section('content')
  <div class="clear"></div>
  <b class="line"></b>
  <div class="listMain">

    <!--分类，导航-->
    <div class="nav-table">
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
    </div>

    <ol class="am-breadcrumb am-breadcrumb-slash">
      <li style="font-size: 20px"></li>
    </ol>


    <div class="clear"></div>

    <script type="text/javascript">
          $(function() {});
          $(window).load(function() {
            $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                $('body').removeClass('loading');
              }
            });
          });
        </script>
    <div class="scoll">
      <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li><img src="{{ asset('home/images/01.jpg') }}" title="pic" /></li>
            <li><img src="{{ asset('home/images/02.jpg') }}" /></li>
            <li><img src="{{ asset('home/images/03.jpg') }}" /></li>
          </ul>
        </div>
      </section>
    </div>

    <div class="item-inform">
      <div class="clearfixLeft" id="clearcontent">
        <div class="box">
          <div class="tb-booth tb-pic tb-s310">
            <img src="{{ asset('home/images/' . $list->picname) }}" />
          </div>
        </div>

        <div class="clear"></div>
      </div>

      <div class="clearfixRight">

        <!--规格属性-->
        <!--名称-->
        <div class="tb-detail-hd">
          <h1>{{ $list->title }}</h1>
        </div>
        <div class="tb-detail-list">
          <!--价格-->
          <div class="tb-detail-price">
            <li class="price iteminfo_price">
              <dt>当前价</dt>
              <dd>
                <em>¥</em><b id='price' class="sys_item_price">{{ $list->price + $list->increase * $list->incre }}</b>
              </dd>
            </li>
            <li class="price iteminfo_mktprice">
              <dt>保证金</dt>
              <dd>
                <b>￥{{ $list->cash }}</b>
              </dd>
            </li>
            <div class="clear"></div>
          </div>

          <div class="clear"></div>

        </div>

        <div class="pay">
          <li>
            <div class="clearfix tb-btn tb-btn-buy theme-login">
              <a id="LikBuy" onclick="onJingpai()">竞拍</a>
            </div>
          </li>
          <script>
              function onJingpai()
              {
                  var url = "{{ url('auction/increase') }}";
                  var id = "{{ $list->id }}";
            	  $.ajax({
            		  url:url,
            		  type:'get',
            		  data:{id:id},
            		  success:function(data){
            		    $aa = {{ $list->incre }} * data + {{  $list->startprice }};
                        $('#price').html($aa);
            		  }
            		});
              }
          </script>
        </div>
      </div>
      <div class="clear"></div>
    </div>

        @if (session('username'))
        <div class="match">
          <div class="match-title">发布留言</div>
          <div class="match-comment">
            <ul class="like_list">
              <li>
              <form action="" method="post" name="commentForm">
              {{ csrf_field() }}
                <div class="info-box">
                  <textarea cols="100" rows="3" placeholder="有什么相对卖家说的..." name="commentContent"></textarea>
                  <input type="hidden" name="uid" value="{{ session('userid') }}" />
                </div>
              </form>
              </li>
              <li class="total_price">
                <a href="javascript:dosubmit()" class="buy_now">发布</a></li>
              <li class="plus_icon"><i class="am-icon-angle-right"></i></li>
            </ul>
          </div>
        </div>
        @endif
        <script>
          function dosubmit(){
              var myform = document.commentForm;
              // alert("{{ url('/comment') }}");
              myform.action = "{{ url('/comment') }}";
              myform.submit();
          }
        </script>

    <!-- introduce-->

    <div class="introduce">
      <div class="browse">
        <div class="mc">
          <ul>
            <div class="mt">
              <h2>看了又看</h2>
            </div>

            <li class="first">
              <div class="p-img">
                <a href="#"> <img class="" src="{{ asset('home/images/browse1.jpg') }}">
                </a>
              </div>
              <div class="p-name">
                <a href="#"> 【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味 </a>
              </div>
              <div class="p-price">
                <strong>￥35.90</strong>
              </div>
            </li>

          </ul>
        </div>
      </div>
      <div class="introduceMain">
        <div class="am-tabs" data-am-tabs>
          <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#"> <span class="index-needs-dt-txt">宝贝介绍</span></a></li>

            <li><a href="#"> <span class="index-needs-dt-txt">全部评价</span></a></li>

            <li><a href="#"> <span class="index-needs-dt-txt">猜你喜欢</span></a></li>
          </ul>

          <div class="am-tabs-bd">

            <div class="am-tab-panel am-fade am-in am-active">
              <div class="J_Brand">

                <div class="attr-list-hd tm-clear">
                  <h4>宝贝介绍</h4>
                </div>
                <div class="clear"></div>
                {{ $list->description }}
                <div class="clear"></div>
              </div>

              <div class="details">
                <div class="attr-list-hd after-market-hd">
                  <h4>商品图片</h4>
                </div>
                <div class="twlistNews">
                @foreach($pics as $pic)
                  <img width="600" height="500" src="{{ asset('home/images/' . $pic->picname) }}" />
                @endforeach

                </div>
              </div>
              <div class="clear"></div>

            </div>

            <div class="am-tab-panel am-fade">
              <ul class="am-comments-list am-comments-list-flip">


              </ul>

              <div class="clear"></div>

              <!--分页 -->
              <ul class="am-pagination am-pagination-right">
                <li class="am-disabled"><a href="#">&laquo;</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
              <div class="clear"></div>

              <div class="tb-reviewsft">
                <div class="tb-rate-alert type-attention">
                  购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。
                </div>
              </div>

            </div>

            <div class="am-tab-panel am-fade">
              <div class="like">
                <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                  <li>
                    <div class="i-pic limit">
                      <img src="{{ asset('home/images/imgsearch1.jpg') }}" />
                      <p>
                        【良品铺子_开口松子】零食坚果特产炒货 <span>东北红松子奶油味</span>
                      </p>
                      <p class="price fl">
                        <b>¥</b> <strong>298.00</strong>
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="clear"></div>

              <!--分页 -->
              <ul class="am-pagination am-pagination-right">
                <li class="am-disabled"><a href="#">&laquo;</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
              <div class="clear"></div>

            </div>
          </div>
        </div>
        <div class="clear"></div>

@endsection

{{-- 页面指定行内JS --}}
@section('specifiedInnerJS')
<script>

</script>
@endsection

</body>

</html>