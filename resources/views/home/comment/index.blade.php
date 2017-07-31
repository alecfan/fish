@extends('home.person.parent')

@section('commentActive')
active
@endsection

@section('specifiedCSS')
<link href="{{ asset('home/css/cmstyle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

          <div class="user-comment">
            <!--标题 -->
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
            </div>
            <hr>

            <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">
              <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="#tab1">所有评价</a></li>
              </ul>

              <div class="am-tabs-bd" style="touch-action: pan-y; -moz-user-select: none;">
                <div class="am-tab-panel am-fade am-active am-in" id="tab1">

                  <div class="comment-main">
                    <div class="comment-list">
                      <ul class="item-list">

                        <div class="comment-top">
                          <div class="th th-price">
                            评价
                          </div>
                          <div class="th th-item">
                            商品
                          </div>
                        </div>
                        {{--遍历评论开始--}}
                        @foreach($comments as $comment)
                        <li class="td td-comment">
                          <div class="item-title">
                            <div class="item-opinion">好评</div>
                            <div class="item-name">
                              <a href="{{ url('goods/' . $comment->gid ) }}">
                                <p class="item-basic-info">{{ $comment->title }}</p>
                              </a>
                            </div>
                          </div>
                          <div class="item-comment">
                            {{ $comment->content }}
                          </div>


                        </li>
                        {{--遍历评论结束--}}
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
@endsection