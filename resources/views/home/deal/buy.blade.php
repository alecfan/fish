@extends('home.person.parent') {{-- 个人信息页css --}} @section('content')
<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css') }} "
  rel="stylesheet" type="text/css">
<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}"
  rel="stylesheet" type="text/css">

<link href="{{ asset('home/css/personal.css') }}" rel="stylesheet"
  type="text/css">
<link href="{{ asset('home/css/orstyle.css') }}" rel="stylesheet"
  type="text/css">

<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.js') }}"></script>

 <!--标题 -->
<form name='myform' action="" style='display:none' method='post'>
    {{ csrf_field() }}
</form>
 <div class="am-cf am-padding">
     <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我买到的</strong> / <small>Buy</small></div>
</div>

<div class="user-info">
  @if (session('msg'))
  <div style="color: red;">{{ session('msg') }}</div>
  @endif @if (session('error'))
  <div style="color: red;">{{ session('error') }}</div>
  @endif
</div>

<div class="user-order">
            <hr>
            <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">
              <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="#tab1">买到的商品</a></li>
              </ul>
              <div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                  <div class="order-top">

                    <div class="th th-item">
                      商品
                    </div>
                    <div class="th th-orderprice th-price">
                      交易价格
                    </div>

                    <div class="th th-status th-moneystatus" style='margin-left:95px;'>
                      交易状态
                    </div>
                    <div class="th th-change th-changebuttom">
                      商品操作
                    </div>
                  </div>

                  <div class="order-main">

                   <?php
                if (empty($list)) {
                    ?>
                    <div style="font-size:25px; text-align:center;margin-top:100px;font-family:'宋体';color:red;"> 您还没有购物哦。亲！！ </div>
                   <?php
                } else {
                    ?>
                  @foreach($list as $v)

                    <div class="order-list" style='margin-bottom:15px'>
                      <div class="order-title">
                        <div class="dd-num">发布时间<a href="javascript:;">{{ date('Y-m-d H:i', $v->addtime) }}</a></div>

                        <!--    <em>店铺：小桔灯</em>-->
                      </div>
                      <div class="order-content">
                        <div class="order-left">
                          <ul class="item-list">
                            <li class="td td-item">
                              <div class="item-pic">
                                <a href="#" class="J_MakePoint">
                                  <img src="{{ url('/home/images/' . $v->picname) }}" class="itempic J_ItemImg" style="width:80px;height:80px">
                                </a>
                              </div>
                              <div class="item-info">
                                <div class="item-basic-info">
                                  <a href="#">
                                    <p>{{ $v->title}}</p>
                                    <p class="info-little">

                                    <br>   订单号：{{ $v->orderid }}
                                    <br>   地址：{{ $v->address }}
                                    <br>   手机号 {{ $v->phone }}
                                     </p>

                                  </a>
                                </div>
                              </div>
                            </li>

                            <ul class="td-changeorder">
                              <li class="td td-orderprice">
                                <div class="item-orderprice">
                                  <span>交易金额：</span>{{$v->price}}
                                </div>
                              </li>

                            </ul>


                            <div class="change move-right">
                            <li class="td td-moneystatus td-status">
                              <div class="item-status">
                                <p class="Mystatus">

                    <?php
                    if ($v->status == 0) {
                        echo '已拍下';
                    } else if ($v->status == 1) {
                        echo '已付款';
                    } else if ($v->status == 2) {
                        echo '已完成';
                    }
                    ?>
                      <br><a href="/orderinfo/{{$v->id}}">订单详情</a>
                                </p>
                              </div>
                            </li>
                          </div>
                            <div class="clear">
                            </div>
                          </ul>
                          <li class="td td-change td-changebutton">
                            <a href="javascript:doDel({{ $v->id }})">
                            <button class="am-btn am-btn-danger anniu">
                                                                         删除</button>
                            </a>

                          </li>
                        </div>
                      </div>
                    </div>
@endforeach
<?php
                }
                ?>
                  </div>
{!! $list->render() !!}
                </div>
              </div>
            </div>
          </div>
<script>

function doDel(id) {
  var form = document . myform;
  var url = "{{ url('/buy') }}"
  form.action = url + '/' + id;
                form . submit();
            }
</script>

@endsection
