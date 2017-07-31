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
      <img src="{{ asset('home/upload/' . $good->photo ) }}" width="50" height="50" />
      <li style="font-size: 20px">{{ $good->username }}</li>
      <li>
        {{ $timeMess }}来过&nbsp;&nbsp;
      </li>
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

    <!--放大镜-->

    <div class="item-inform">
      <div class="clearfixLeft" id="clearcontent">
        <div class="box">
          <script type="text/javascript">
                $(document).ready(function() {
                  $(".jqzoom").imagezoom();
                  $("#thumblist li a").click(function() {
                    $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                    $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                    $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                  });
                });
           </script>
          <div class="tb-booth tb-pic tb-s310">
            <img src="{{ asset('home/images/' . $mpic->picname) }}" />
          </div>
        </div>

        <div class="clear"></div>
      </div>

      <div class="clearfixRight">

        <!--规格属性-->
        <!--名称-->
        <div class="tb-detail-hd">
          <h1>{{ $good->title }}</h1>
        </div>
        <div class="tb-detail-list">
          <!--价格-->
          <div class="tb-detail-price">
            <li class="price iteminfo_price">
              <dt>转卖价</dt>
              <dd>
                <em>¥</em><b class="sys_item_price">{{ $good->price }}</b>
              </dd>
            </li>
            <li class="price iteminfo_mktprice">
              <dt>所在地</dt>
              <dd>
                <b>{{ $good->locate }}</b>
              </dd>
            </li>
            <div class="clear"></div>
          </div>


          <div class="clear"></div>



          <!--各种规格-->
          <dl class="iteminfo_parameter sys_item_specpara">
            <dt class="theme-login">
              <div class="cart-title">
                可选规格<span class="am-icon-angle-right"></span>
              </div>
            </dt>
            <dd>
              <!--操作页面-->

              <div class="theme-popover-mask"></div>
              <div class="theme-popover">
                <div class="theme-span"></div>
                <div class="theme-poptit">
                  <a href="javascript:;" title="关闭" class="close">×</a>
                </div>
                <div class="theme-popbod dform">
                  <form class="theme-signin" name="loginform" action="" method="post">

                    <div class="theme-signin-left">

                      <div class="clear"></div>

                      <div class="btn-op">
                        <div class="btn am-btn am-btn-warning">确认</div>
                        <div class="btn close am-btn am-btn-warning">取消</div>
                      </div>
                    </div>
                    <div class="theme-signin-right">
                      <div class="img-info">
                        <img src="{{ asset('home/images/songzi.jpg') }}" />
                      </div>
                      <div class="text-info">
                        <span class="J_Price price-now">¥39.00</span> <span id="Stock" class="tb-hidden">库存<span
                          class="stock">1000</span>件
                        </span>
                      </div>
                    </div>

                  </form>
                </div>
              </div>

            </dd>
          </dl>
          <div class="clear"></div>
          <!--活动  -->
        </div>

        <div class="pay">
          <div class="pay-opt">
            <a href="home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
            <a><span class="am-icon-heart am-icon-fw">收藏</span></a>
          </div>
          <li>
            <div class="clearfix tb-btn tb-btn-buy theme-login">
              <a id="LikBuy" title="" href="{{ url('/orders/create?gid=') . $good->id }}">立即购买</a>
            </div>
          </li>
          <li>
            <div class="clearfix tb-btn tb-btn-basket theme-login">
            @if($iscollect)
              <a id="LikBasket" href="javascript:void(true)">取消收藏</a>
            @else
              <a id="LikBasket" href="javascript:void(true)">点击收藏</a>
            @endif
            </div>
          </li>
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
                  <input type="hidden" name="gid" value="{{ $good->id }}" />
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
                {{ $good->description }}
                <div class="clear"></div>
              </div>

              <div class="details">
                <div class="attr-list-hd after-market-hd">
                  <h4>商品图片</h4>
                </div>
                <div class="twlistNews">
                  <img width="600" height="500" src="{{ asset('home/images/' . $mpic->picname) }}" />
                @foreach($goodpics as $goodpic)
                  <img width="600" height="500" src="{{ asset('home/images/' . $goodpic->picname) }}" />
                @endforeach

                </div>
              </div>
              <div class="clear"></div>

            </div>

            <div class="am-tab-panel am-fade">
              <ul class="am-comments-list am-comments-list-flip">
              @foreach($comments as $comment)
                <li class="am-comment">
                  <!-- 评论容器 --> <a href=""> <img class="am-comment-avatar" src="{{ asset('home/images/hwbn40x40.jpg') }}" /> <!-- 评论者头像 -->
                </a>
                  <div class="am-comment-main">
                    <!-- 评论内容容器 -->
                    <header class="am-comment-hd">
                      <!--<h3 class="am-comment-title">评论标题</h3>-->
                      <div class="am-comment-meta">
                        <!-- 评论元数据 -->
                        <a href="#link-to-user" class="am-comment-author">{{ $comment->username }}</a>
                        <!-- 评论者 -->
                        评论于
                        <time datetime="">{{ date('Y-m-d H:i:s', $comment->addtime) }}</time>
                      </div>
                    </header>

                    <div class="am-comment-bd">
                      <div class="tb-rev-item " data-id="255776406962">
                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                          {{ $comment->content }}</div>
                      </div>

                    </div>
                    <!-- 评论内容 -->
                  </div>
                </li>
                @endforeach

              </ul>

              <div class="clear"></div>

              <!--分页 -->
              <ul class="am-pagination am-pagination-right">
                <li class="am-disabled"><a href="#">&laquo;</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li class="am-disabled"><a href="#">&raquo;</a></li>
              </ul>
              <div class="clear"></div>


            </div>
            {{-- 猜你喜欢开始 --}}
            <div class="am-tab-panel am-fade">
              <div class="like">
                <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                  @foreach($likes as $like)
                  <li>
                    <div class="i-pic limit">
                      <img src="{{ asset('home/images/' . $like->picname ) }}" />
                      <p>
                        {{ $like->title }}
                      </p>
                      <p class="price fl">
                        <b>¥</b> <strong>{{ $like->price }}</strong>
                      </p>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
              <div class="clear"></div>

              <!--分页 -->
              <ul class="am-pagination am-pagination-right">
                <li class="am-disabled"><a href="#">&laquo;</a></li>
                <li class="am-active"><a href="#">1</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
              <div class="clear"></div>

            </div>
            {{-- 猜你喜欢结束 --}}
          </div>
        </div>
        <div class="clear"></div>

@endsection

{{-- 页面指定行内JS --}}
@section('specifiedInnerJS')
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#LikBasket').click(function(){
      var str = $(this).html();
      if (str == '点击收藏') {
          $.post("/collect", {gid : "{{ $good->id }}", uid : "{{ session('userid') }}" }, function(data){
              if (data == '1'){
            	  $('#LikBasket').html('取消收藏');
              }
          });
      } else {
    	  $.post("/cancelcollect", {gid : "{{ $good->id }}", uid : "{{ session('userid') }}" }, function(data){
              if (data == '1'){
            	  $('#LikBasket').html('点击收藏');
              }
          });
      }
  });
</script>
@endsection

</body>

</html>