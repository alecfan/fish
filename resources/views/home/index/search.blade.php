{{-- ********************************
FileName： search.blade.php
Author: Zhuyunfei  Date: 2017-07-30
Description: 分类搜索列表页模板
********************************* --}}

@extends('home.parent')

@section('title')
搜索商品 --- {{ isset($sear['keyword']) ? $sear['keyword'] : '' }}
@endsection

{{-- 指定页面CSS --}}
@section('specifiedCSS')
    <link href="{{ asset('home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- 指定页面JS --}}
@section('specifiedJS')
    <script type="text/javascript" src="{{ asset('home/basic/js/jquery-1.7.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/script.js') }}"></script>
@endsection

@section('content')
<div class="clear"></div>
      <b class="line"></b>
           <div class="search">
      <div class="search-list">
      <div class="nav-table">
             <div class="long-title"><span class="all-goods">全部分类</span></div>
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


          <div class="am-g am-g-fixed">
            <div class="am-u-sm-12 am-u-md-12">
             <div class="theme-popover">
              <ul class="select">
                <p class="title font-normal">
                  <span class="fl">{{ isset($sear['keyword']) ? $sear['keyword'] : '' }}</span>
                  <span class="total fl">搜索到<strong class="num">{{ count($goods) }}</strong>件相关商品</span>
                </p>
                <div class="clear"></div>
                <li class="select-result">
                  <dl>
                    <dt>已选</dt>
                    <dd class="select-no"></dd>
                    <p class="eliminateCriteria">清除</p>
                  </dl>
                </li>
                <div class="clear"></div>
                <li class="select-list">
                  <dl id="select1">
                    <dt class="am-badge am-round">所有分类</dt>
                     <div class="dd-conent">
                      <dd class="select-all"><a href="/search">全部</a></dd>
                      @foreach($type3 as $type)
                      <dd class="{{ (isset($tid) && $tid == $type->id) ? 'selected' : '' }}"><a href="{{ url('/search?tid=' . $type->id) }}">{{ $type->tname }}</a></dd>
                      @endforeach
                     </div>
                  </dl>
                </li>

              </ul>
              <div class="clear"></div>
            </div>
              <div class="search-content">
                <div class="sort">
                  <li class=""><a title="综合" href="{{ url('/search?tid='. (isset($tid)?$tid:'') .'&page=1' ) }}">综合排序</a></li>
                  <li class=""><a title="评价" href="{{ url('/search?tid='. (isset($tid)?$tid:'') .'&page=1' . '&sort=addtime'  ) }}">最新发布</a></li>
                  <li class=""><a title="价格" href="{{ url('/search?tid='. (isset($tid)?$tid:'') .'&page=1' . '&sort=price'  ) }}">价格</a></li>
                </div>
                <div class="clear"></div>

                <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                  @foreach($goods as $good)
                  <li>
                    <div class="i-pic limit">
                      <p><img style="width:30px; height:30px" src="{{ asset('home/upload/' . $good->photo) }}">
                      <a href="{{ url('/search/username/' . $good->username ) }}">{{ $good->username }}</a></p>
                      <a href="{{ url('/goods/' . $good->id) }}"><img src="{{ asset('home/images/' . $good->picname) }}" /></a>
                      <p class="title fl">{{ $good->title }}</p>
                      <p class="price fl">
                        <b>¥</b>
                        <strong>{{ $good->price }}</strong>
                      </p>
                      <p class="number fl">
                        销量<span>1110</span>
                      </p>
                    </div>
                  </li>
                  @endforeach

              </div>
              <div class="clear"></div>
              <!--分页 -->
              <ul class="am-pagination am-pagination-right">
                <li class="{{ ($page->page == 1) ? 'am-disabled' : '' }}">
                  <a href="{{ url('/search?tid='. (isset($tid)?$tid:'') .'&page=' . $page->prev . '&sort=' . (isset($sort) ? $sort : '') ) }}">&laquo;</a>
                </li>
                @for($i = 1; $i<= $page->last; $i++)
                <li class="{{ ($page->page == $i) ? 'am-active' : '' }}">
                  <a href="{{ url('/search?tid='. (isset($tid)?$tid:'') .'&page=' . $i . '&sort=' . (isset($sort) ? $sort : '') ) }}">{{ $i }}</a>
                </li>
                @endfor
                <li class="{{ ($page->page == $page->last) ? 'am-disabled' : '' }}">
                  <a href="{{ url('/search?tid='. (isset($tid)?$tid:'') .'&page=' . $page->next . '&sort=' . (isset($sort) ? $sort : '') ) }}">&raquo;</a>
                </li>
              </ul>

            </div>
          </div>

@endsection