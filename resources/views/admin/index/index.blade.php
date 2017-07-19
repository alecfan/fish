@extends('admin.parent') @section('indexActive') class="active" @endsection @section('content')
<div class="page-content">
  <div class="page-header">
    <h1>
                控制台
                <small>
                  <i class="icon-double-angle-right"></i>
                   查看
                </small>
              </h1>
  </div>
  <!-- /.page-header -->
  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <div class="alert alert-block alert-success">
        <button type="button" class="close" data-dismiss="alert">
          <i class="icon-remove"></i>
        </button>
        <i class="icon-ok green"></i> 欢迎使用
        <strong class="green">
                    Fish后台管理系统
                    <small>(v1.0)</small>
                  </strong>
      </div>
      <div class="row">
        <div class="space-6"></div>
        <div class="col-sm-7 infobox-container">
          <div class="infobox infobox-green  ">
            <div class="infobox-icon">
              <i class="icon-comments"></i>
            </div>
            <div class="infobox-data">
              <span class="infobox-data-number">32</span>
              <div class="infobox-content">2个评论</div>
            </div>
            <div class="stat stat-success">8%</div>
          </div>
          <div class="infobox infobox-blue  ">
            <div class="infobox-icon">
              <i class="icon-twitter"></i>
            </div>
            <div class="infobox-data">
              <span class="infobox-data-number">11</span>
              <div class="infobox-content">新粉丝</div>
            </div>
            <div class="badge badge-success">
              +32%
              <i class="icon-arrow-up"></i>
            </div>
          </div>
          <div class="infobox infobox-pink  ">
            <div class="infobox-icon">
              <i class="icon-shopping-cart"></i>
            </div>
            <div class="infobox-data">
              <span class="infobox-data-number">8</span>
              <div class="infobox-content">新订单</div>
            </div>
            <div class="stat stat-important">4%</div>
          </div>
          <div class="infobox infobox-red  ">
            <div class="infobox-icon">
              <i class="icon-beaker"></i>
            </div>
            <div class="infobox-data">
              <span class="infobox-data-number">7</span>
              <div class="infobox-content">调查</div>
            </div>
          </div>
          <div class="infobox infobox-orange2  ">
            <div class="infobox-chart">
              <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas></span>
            </div>
            <div class="infobox-data">
              <span class="infobox-data-number">6,251</span>
              <div class="infobox-content">页面查看次数</div>
            </div>
            <div class="badge badge-success">
              7.2%
              <i class="icon-arrow-up"></i>
            </div>
          </div>
          <div class="infobox infobox-blue2  ">
            <div class="infobox-progress">
              <div class="easy-pie-chart percentage easyPieChart" data-percent="42" data-size="46" style="width: 46px; height: 46px; line-height: 46px;">
                <span class="percent">42</span>%
                <canvas width="46" height="46"></canvas>
              </div>
            </div>
            <div class="infobox-data">
              <span class="infobox-text">交易使用</span>
              <div class="infobox-content">
                <span class="bigger-110">~</span> 剩余58GB
              </div>
            </div>
          </div>
          <div class="space-6"></div>
          <div class="infobox infobox-green infobox-small infobox-dark">
            <div class="infobox-progress">
              <div class="easy-pie-chart percentage easyPieChart" data-percent="61" data-size="39" style="width: 39px; height: 39px; line-height: 39px;">
                <span class="percent">61</span>%
                <canvas width="39" height="39"></canvas>
              </div>
            </div>
            <div class="infobox-data">
              <div class="infobox-content">任务</div>
              <div class="infobox-content">完成</div>
            </div>
          </div>
          <div class="infobox infobox-blue infobox-small infobox-dark">
            <div class="infobox-chart">
              <span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas width="39" height="19" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;"></canvas></span>
            </div>
            <div class="infobox-data">
              <div class="infobox-content">获得</div>
              <div class="infobox-content">$32,000</div>
            </div>
          </div>
          <div class="infobox infobox-grey infobox-small infobox-dark">
            <div class="infobox-icon">
              <i class="icon-download-alt"></i>
            </div>
            <div class="infobox-data">
              <div class="infobox-content">下载次数</div>
              <div class="infobox-content">1,205</div>
            </div>
          </div>
        </div>
        <div class="vspace-sm"></div>
        <div class="col-sm-5">
          <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
              <h5>
                          <i class="icon-signal"></i>
                          访问来源
                        </h5>
              <div class="widget-toolbar no-border">
                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                  本周
                  <i class="icon-angle-down icon-on-right bigger-110"></i>
                </button>
                <ul class="dropdown-menu pull-right dropdown-125 dropdown-lighter dropdown-caret">
                  <li class="active">
                    <a href="#" class="blue">
                      <i class="icon-caret-right bigger-110">&nbsp;</i> 本周
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon-caret-right bigger-110 invisible">&nbsp;</i> 上周
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon-caret-right bigger-110 invisible">&nbsp;</i> 本月
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="icon-caret-right bigger-110 invisible">&nbsp;</i> 上月
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-main">
                <div id="piechart-placeholder" style="width: 90%; min-height: 150px; padding: 0px; position: relative;">
                  <canvas class="flot-base" width="384" height="150" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 384px; height: 150px;"></canvas>
                  <canvas class="flot-overlay" width="384" height="150" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 384px; height: 150px;"></canvas>
                  <div class="legend">
                    <div style="position: absolute; width: 107px; height: 110px; top: 15px; right: -30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                    <table style="position:absolute;top:15px;right:-30px;;font-size:smaller;color:#545454">
                      <tbody>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #68BC31;overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">social networks</td>
                        </tr>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">search engines</td>
                        </tr>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">ad campaigns</td>
                        </tr>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">direct traffic</td>
                        </tr>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid null;padding:1px">
                              <div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">other</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="hr hr8 hr-double"></div>
                <div class="clearfix">
                  <div class="grid3">
                    <span class="grey">
                                <i class="icon-facebook-sign icon-2x blue"></i>
                                &nbsp; likes
                              </span>
                    <h4 class="bigger pull-right">1,255</h4>
                  </div>
                  <div class="grid3">
                    <span class="grey">
                                <i class="icon-twitter-sign icon-2x purple"></i>
                                &nbsp; tweets
                              </span>
                    <h4 class="bigger pull-right">941</h4>
                  </div>
                  <div class="grid3">
                    <span class="grey">
                                <i class="icon-pinterest-sign icon-2x red"></i>
                                &nbsp; pins
                              </span>
                    <h4 class="bigger pull-right">1,050</h4>
                  </div>
                </div>
              </div>
              <!-- /widget-main -->
            </div>
            <!-- /widget-body -->
          </div>
          <!-- /widget-box -->
        </div>
        <!-- /span -->
      </div>
      <!-- /row -->
      <div class="hr hr32 hr-dotted"></div>
      <div class="row">
        <div class="col-sm-5">
          <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
              <h4 class="lighter">
                          <i class="icon-star orange"></i>
                          热门域名
                        </h4>
              <div class="widget-toolbar">
                <a href="#" data-action="collapse">
                  <i class="icon-chevron-up"></i>
                </a>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-main no-padding">
                <table class="table table-bordered table-striped">
                  <thead class="thin-border-bottom">
                    <tr>
                      <th>
                        <i class="icon-caret-right blue"></i> 名称
                      </th>
                      <th>
                        <i class="icon-caret-right blue"></i> 价格
                      </th>
                      <th class="hidden-480">
                        <i class="icon-caret-right blue"></i> 状态
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>internet.com</td>
                      <td>
                        <small>
                                    <s class="red">$29.99</s>
                                  </small>
                        <b class="green">$19.99</b>
                      </td>
                      <td class="hidden-480">
                        <span class="label label-info arrowed-right arrowed-in">销售中</span>
                      </td>
                    </tr>
                    <tr>
                      <td>online.com</td>
                      <td>
                        <small>
                                    <s class="red"></s>
                                  </small>
                        <b class="green">$16.45</b>
                      </td>
                      <td class="hidden-480">
                        <span class="label label-success arrowed-in arrowed-in-right">可用</span>
                      </td>
                    </tr>
                    <tr>
                      <td>newnet.com</td>
                      <td>
                        <small>
                                    <s class="red"></s>
                                  </small>
                        <b class="green">$15.00</b>
                      </td>
                      <td class="hidden-480">
                        <span class="label label-danger arrowed">待定</span>
                      </td>
                    </tr>
                    <tr>
                      <td>web.com</td>
                      <td>
                        <small>
                                    <s class="red">$24.99</s>
                                  </small>
                        <b class="green">$19.95</b>
                      </td>
                      <td class="hidden-480">
                        <span class="label arrowed">
                                    <s>无货</s>
                                  </span>
                      </td>
                    </tr>
                    <tr>
                      <td>domain.com</td>
                      <td>
                        <small>
                                    <s class="red"></s>
                                  </small>
                        <b class="green">$12.00</b>
                      </td>
                      <td class="hidden-480">
                        <span class="label label-warning arrowed arrowed-right">售完</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /widget-main -->
            </div>
            <!-- /widget-body -->
          </div>
          <!-- /widget-box -->
        </div>
        <div class="col-sm-7">
          <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
              <h4 class="lighter">
                          <i class="icon-signal"></i>
                          销售统计
                        </h4>
              <div class="widget-toolbar">
                <a href="#" data-action="collapse">
                  <i class="icon-chevron-up"></i>
                </a>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-main padding-4">
                <div id="sales-charts" style="width: 100%; height: 220px; padding: 0px; position: relative;">
                  <canvas class="flot-base" width="635" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 635px; height: 220px;"></canvas>
                  <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                    <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 33px; text-align: center;">0.0</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 127px; text-align: center;">1.0</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 221px; text-align: center;">2.0</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 316px; text-align: center;">3.0</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 410px; text-align: center;">4.0</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 504px; text-align: center;">5.0</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 201px; left: 599px; text-align: center;">6.0</div>
                    </div>
                    <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 187px; left: 1px; text-align: right;">-2.000</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 164px; left: 1px; text-align: right;">-1.500</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 140px; left: 1px; text-align: right;">-1.000</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 117px; left: 1px; text-align: right;">-0.500</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 94px; left: 5px; text-align: right;">0.000</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 70px; left: 5px; text-align: right;">0.500</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 47px; left: 5px; text-align: right;">1.000</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 23px; left: 5px; text-align: right;">1.500</div>
                      <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 5px; text-align: right;">2.000</div>
                    </div>
                  </div>
                  <canvas class="flot-overlay" width="635" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 635px; height: 220px;"></canvas>
                  <div class="legend">
                    <div style="position: absolute; width: 72px; height: 66px; top: 14px; right: 14px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                    <table style="position:absolute;top:14px;right:14px;;font-size:smaller;color:#545454">
                      <tbody>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid #ccc;padding:1px">
                              <div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">Domains</td>
                        </tr>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid #ccc;padding:1px">
                              <div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">Hosting</td>
                        </tr>
                        <tr>
                          <td class="legendColorBox">
                            <div style="border:1px solid #ccc;padding:1px">
                              <div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div>
                            </div>
                          </td>
                          <td class="legendLabel">Services</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /widget-main -->
            </div>
            <!-- /widget-body -->
          </div>
          <!-- /widget-box -->
        </div>
      </div>
      <div class="hr hr32 hr-dotted"></div>
      <div class="row">
        <div class="col-sm-6">
          <div class="widget-box transparent" id="recent-box">
            <div class="widget-header">
              <h4 class="lighter smaller">
                          <i class="icon-rss orange"></i>
                          最近
                        </h4>
              <div class="widget-toolbar no-border">
                <ul class="nav nav-tabs" id="recent-tab">
                  <li class="active">
                    <a data-toggle="tab" href="#task-tab">任务</a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#member-tab">会员</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#comment-tab">评论</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="widget-body">
              <div class="widget-main padding-4">
                <div class="tab-content padding-8 overflow-visible">
                  <div id="task-tab" class="tab-pane active">
                    <h4 class="smaller lighter green">
                                <i class="icon-list"></i>
                                可拖拽排序列表
                              </h4>
                    <ul id="tasks" class="item-list ui-sortable">
                      <li class="item-orange clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl"> 问答</span>
                        </label>
                        <div class="pull-right easy-pie-chart percentage easyPieChart" data-size="30" data-color="#ECCB71" data-percent="42" style="width: 30px; height: 30px; line-height: 30px;">
                          <span class="percent">42</span>%
                          <canvas width="30" height="30"></canvas>
                        </div>
                      </li>
                      <li class="item-red clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl"> BUG修复</span>
                        </label>
                        <div class="pull-right action-buttons">
                          <a href="#" class="blue">
                            <i class="icon-pencil bigger-130"></i>
                          </a>
                          <span class="vbar"></span>
                          <a href="#" class="red">
                            <i class="icon-trash bigger-130"></i>
                          </a>
                          <span class="vbar"></span>
                          <a href="#" class="green">
                            <i class="icon-flag bigger-130"></i>
                          </a>
                        </div>
                      </li>
                      <li class="item-default clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl">添加新的特征</span>
                        </label>
                        <div class="inline pull-right position-relative dropdown-hover">
                          <button class="btn btn-minier bigger btn-primary">
                            <i class="icon-cog icon-only bigger-120"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-caret dropdown-close pull-right">
                            <li>
                              <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Mark&nbsp;as&nbsp;done">
                                <span class="green">
                                            <i class="icon-ok bigger-110"></i>
                                          </span>
                              </a>
                            </li>
                            <li>
                              <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                <span class="red">
                                            <i class="icon-trash bigger-110"></i>
                                          </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="item-blue clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl"> 更新模版脚本</span>
                        </label>
                      </li>
                      <li class="item-grey clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl"> 添加新皮肤</span>
                        </label>
                      </li>
                      <li class="item-green clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl"> 升级服务端</span>
                        </label>
                      </li>
                      <li class="item-pink clearfix">
                        <label class="inline">
                          <input type="checkbox" class="ace">
                          <span class="lbl"> 清理垃圾</span>
                        </label>
                      </li>
                    </ul>
                  </div>
                  <div id="member-tab" class="tab-pane">
                    <div class="clearfix">
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Bob Doe's avatar" src="{{ asset('admin/avatars/user.jpg') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Bob Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">20 min</span>
                          </div>
                          <div>
                            <span class="label label-warning label-sm">pending</span>
                            <div class="inline position-relative">
                              <button class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-angle-down icon-only bigger-120"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li>
                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Approve">
                                    <span class="green">
                                                <i class="icon-ok bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-warning" data-rel="tooltip" title="" data-original-title="Reject">
                                    <span class="orange">
                                                <i class="icon-remove bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                    <span class="red">
                                                <i class="icon-trash bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Joe Doe's avatar" src="{{ asset('admin/avatars/avatar2.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Joe Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">1 hour</span>
                          </div>
                          <div>
                            <span class="label label-warning label-sm">pending</span>
                            <div class="inline position-relative">
                              <button class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-angle-down icon-only bigger-120"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li>
                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Approve">
                                    <span class="green">
                                                <i class="icon-ok bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-warning" data-rel="tooltip" title="" data-original-title="Reject">
                                    <span class="orange">
                                                <i class="icon-remove bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                    <span class="red">
                                                <i class="icon-trash bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Jim Doe's avatar" src="{{ asset('admin/avatars/avatar.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Jim Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">2 hour</span>
                          </div>
                          <div>
                            <span class="label label-warning label-sm">pending</span>
                            <div class="inline position-relative">
                              <button class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-angle-down icon-only bigger-120"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li>
                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Approve">
                                    <span class="green">
                                                <i class="icon-ok bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-warning" data-rel="tooltip" title="" data-original-title="Reject">
                                    <span class="orange">
                                                <i class="icon-remove bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                    <span class="red">
                                                <i class="icon-trash bigger-110"></i>
                                              </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Alex Doe's avatar" src="{{ asset('admin/avatars/avatar5.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Alex Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">3 hour</span>
                          </div>
                          <div>
                            <span class="label label-danger label-sm">blocked</span>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Bob Doe's avatar" src="{{ asset('admin/avatars/avatar2.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Bob Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">6 hour</span>
                          </div>
                          <div>
                            <span class="label label-success label-sm arrowed-in">approved</span>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Susan's avatar" src="{{ asset('admin/avatars/avatar3.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Susan</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">yesterday</span>
                          </div>
                          <div>
                            <span class="label label-success label-sm arrowed-in">approved</span>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Phil Doe's avatar" src="{{ asset('admin/avatars/avatar4.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Phil Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">2 days ago</span>
                          </div>
                          <div>
                            <span class="label label-info label-sm arrowed-in arrowed-in-right">online</span>
                          </div>
                        </div>
                      </div>
                      <div class="itemdiv memberdiv">
                        <div class="user">
                          <img alt="Alexa Doe's avatar" src="{{ asset('admin/avatars/avatar1.png') }}">
                        </div>
                        <div class="body">
                          <div class="name">
                            <a href="#">Alexa Doe</a>
                          </div>
                          <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">3天以前</span>
                          </div>
                          <div>
                            <span class="label label-success label-sm arrowed-in">approved</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="center">
                      <i class="icon-group icon-2x green"></i> &nbsp;
                      <a href="#">
                                  查看所有会员 &nbsp;
                                  <i class="icon-arrow-right"></i>
                                </a>
                    </div>
                    <div class="hr hr-double hr8"></div>
                  </div>
                  <!-- member-tab -->
                  <div id="comment-tab" class="tab-pane">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                      <div class="comments" style="overflow: hidden; width: auto; height: 300px;">
                        <div class="itemdiv commentdiv">
                          <div class="user">
                            <img alt="Bob Doe's Avatar" src="{{ asset('admin/avatars/avatar.png') }}">
                          </div>
                          <div class="body">
                            <div class="name">
                              <a href="#">Bob Doe</a>
                            </div>
                            <div class="time">
                              <i class="icon-time"></i>
                              <span class="green">6 min</span>
                            </div>
                            <div class="text">
                              <i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                            </div>
                          </div>
                          <div class="tools">
                            <div class="inline position-relative">
                              <button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-angle-down icon-only bigger-120"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                <li>
                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Approve">
                                    <span class="green">
                                              <i class="icon-ok bigger-110"></i>
                                            </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-warning" data-rel="tooltip" title="" data-original-title="Reject">
                                    <span class="orange">
                                              <i class="icon-remove bigger-110"></i>
                                            </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                    <span class="red">
                                              <i class="icon-trash bigger-110"></i>
                                            </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="itemdiv commentdiv">
                          <div class="user">
                            <img alt="Jennifer's Avatar" src="{{ asset('admin/avatars/avatar1.png') }}">
                          </div>
                          <div class="body">
                            <div class="name">
                              <a href="#">Jennifer</a>
                            </div>
                            <div class="time">
                              <i class="icon-time"></i>
                              <span class="blue">15 min</span>
                            </div>
                            <div class="text">
                              <i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                            </div>
                          </div>
                          <div class="tools">
                            <div class="action-buttons bigger-125">
                              <a href="#">
                                <i class="icon-pencil blue"></i>
                              </a>
                              <a href="#">
                                <i class="icon-trash red"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="itemdiv commentdiv">
                          <div class="user">
                            <img alt="Joe's Avatar" src="{{ asset('admin/avatars/avatar2.png') }}">
                          </div>
                          <div class="body">
                            <div class="name">
                              <a href="#">Joe</a>
                            </div>
                            <div class="time">
                              <i class="icon-time"></i>
                              <span class="orange">22 min</span>
                            </div>
                            <div class="text">
                              <i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                            </div>
                          </div>
                          <div class="tools">
                            <div class="action-buttons bigger-125">
                              <a href="#">
                                <i class="icon-pencil blue"></i>
                              </a>
                              <a href="#">
                                <i class="icon-trash red"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="itemdiv commentdiv">
                          <div class="user">
                            <img alt="Rita's Avatar" src="{{ asset('admin/avatars/avatar3.png') }}">
                          </div>
                          <div class="body">
                            <div class="name">
                              <a href="#">Rita</a>
                            </div>
                            <div class="time">
                              <i class="icon-time"></i>
                              <span class="red">50 min</span>
                            </div>
                            <div class="text">
                              <i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis …
                            </div>
                          </div>
                          <div class="tools">
                            <div class="action-buttons bigger-125">
                              <a href="#">
                                <i class="icon-pencil blue"></i>
                              </a>
                              <a href="#">
                                <i class="icon-trash red"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="slimScrollBar ui-draggable" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                      <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                    <div class="hr hr8"></div>
                    <div class="center">
                      <i class="icon-comments-alt icon-2x green"></i> &nbsp;
                      <a href="#">
                                  See all comments &nbsp;
                                  <i class="icon-arrow-right"></i>
                                </a>
                    </div>
                    <div class="hr hr-double hr8"></div>
                  </div>
                </div>
              </div>
              <!-- /widget-main -->
            </div>
            <!-- /widget-body -->
          </div>
          <!-- /widget-box -->
        </div>
        <!-- /span -->
        <div class="col-sm-6">
          <div class="widget-box ">
            <div class="widget-header">
              <h4 class="lighter smaller">
                          <i class="icon-comment blue"></i>
                          会话
                        </h4>
            </div>
            <div class="widget-body">
              <div class="widget-main no-padding">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                  <div class="dialogs" style="overflow: hidden; width: auto; height: 300px;">
                    <div class="itemdiv dialogdiv">
                      <div class="user">
                        <img alt="Alexa's Avatar" src="{{ asset('admin/avatars/avatar1.png') }}">
                      </div>
                      <div class="body">
                        <div class="time">
                          <i class="icon-time"></i>
                          <span class="green">4秒钟前</span>
                        </div>
                        <div class="name">
                          <a href="#">Alexa</a>
                        </div>
                        <div class="text">大家好啊</div>
                        <div class="tools">
                          <a href="#" class="btn btn-minier btn-info">
                            <i class="icon-only icon-share-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="itemdiv dialogdiv">
                      <div class="user">
                        <img alt="John's Avatar" src="{{ asset('admin/avatars/avatar.png') }}">
                      </div>
                      <div class="body">
                        <div class="time">
                          <i class="icon-time"></i>
                          <span class="blue">38秒以前</span>
                        </div>
                        <div class="name">
                          <a href="#">John</a>
                        </div>
                        <div class="text">框架很好用嘛</div>
                        <div class="tools">
                          <a href="#" class="btn btn-minier btn-info">
                            <i class="icon-only icon-share-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="itemdiv dialogdiv">
                      <div class="user">
                        <img alt="Bob's Avatar" src="{{ asset('admin/avatars/user.jpg') }}">
                      </div>
                      <div class="body">
                        <div class="time">
                          <i class="icon-time"></i>
                          <span class="orange">2分钟以前</span>
                        </div>
                        <div class="name">
                          <a href="#">Bob</a>
                          <span class="label label-info arrowed arrowed-in-right">admin</span>
                        </div>
                        <div class="text">欢迎大家使用ACE后台管理系统.</div>
                        <div class="tools">
                          <a href="#" class="btn btn-minier btn-info">
                            <i class="icon-only icon-share-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="itemdiv dialogdiv">
                      <div class="user">
                        <img alt="Jim's Avatar" src="{{ asset('admin/avatars/avatar4.png') }}">
                      </div>
                      <div class="body">
                        <div class="time">
                          <i class="icon-time"></i>
                          <span class="grey">3分钟以前</span>
                        </div>
                        <div class="name">
                          <a href="#">Jim</a>
                        </div>
                        <div class="text">大家多提提BUG</div>
                        <div class="tools">
                          <a href="#" class="btn btn-minier btn-info">
                            <i class="icon-only icon-share-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="itemdiv dialogdiv">
                      <div class="user">
                        <img alt="Alexa's Avatar" src="{{ asset('admin/avatars/avatar1.png') }}">
                      </div>
                      <div class="body">
                        <div class="time">
                          <i class="icon-time"></i>
                          <span class="green">4分钟以前</span>
                        </div>
                        <div class="name">
                          <a href="#">Alexa</a>
                        </div>
                        <div class="text">继续支持ACE后台系统</div>
                        <div class="tools">
                          <a href="#" class="btn btn-minier btn-info">
                            <i class="icon-only icon-share-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="slimScrollBar ui-draggable" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 252.809px;"></div>
                  <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
                <form>
                  <div class="form-actions">
                    <div class="input-group">
                      <input placeholder="Type your message here ..." type="text" class="form-control" name="message">
                      <span class="input-group-btn">
                                  <button class="btn btn-sm btn-info no-radius" type="button">
                                    <i class="icon-share-alt"></i>
                                    发送
                                  </button>
                                </span>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /widget-main -->
            </div>
            <!-- /widget-body -->
          </div>
          <!-- /widget-box -->
        </div>
        <!-- /span -->
      </div>
      <!-- /row -->
      <!-- PAGE CONTENT ENDS -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection @section('basejs')
<script src="{{ asset('admin/js/jquery-ui-1.10.3.custom.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.easy-pie-chart.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/js/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('admin/js/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('admin/js/flot/jquery.flot.resize.min.js') }}"></script>
@endsection @section('inlinejs')
<script type="text/javascript">
jQuery(function($) {
  $('.easy-pie-chart.percentage').each(function() {
    var $box = $(this).closest('.infobox');
    var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
    var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
    var size = parseInt($(this).data('size')) || 50;
    $(this).easyPieChart({
      barColor: barColor,
      trackColor: trackColor,
      scaleColor: false,
      lineCap: 'butt',
      lineWidth: parseInt(size / 10),
      animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
      size: size
    });
  })

  $('.sparkline').each(function() {
    var $box = $(this).closest('.infobox');
    var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
    $(this).sparkline('html', {
      tagValuesAttribute: 'data-values',
      type: 'bar',
      barColor: barColor,
      chartRangeMin: $(this).data('min') || 0
    });
  });




  var placeholder = $('#piechart-placeholder').css({
    'width': '90%',
    'min-height': '150px'
  });
  var data = [{
    label: "social networks",
    data: 38.7,
    color: "#68BC31"
  }, {
    label: "search engines",
    data: 24.5,
    color: "#2091CF"
  }, {
    label: "ad campaigns",
    data: 8.2,
    color: "#AF4E96"
  }, {
    label: "direct traffic",
    data: 18.6,
    color: "#DA5430"
  }, {
    label: "other",
    data: 10,
    color: "#FEE074"
  }]

  function drawPieChart(placeholder, data, position) {
    $.plot(placeholder, data, {
      series: {
        pie: {
          show: true,
          tilt: 0.8,
          highlight: {
            opacity: 0.25
          },
          stroke: {
            color: '#fff',
            width: 2
          },
          startAngle: 2
        }
      },
      legend: {
        show: true,
        position: position || "ne",
        labelBoxBorderColor: null,
        margin: [-30, 15]
      },
      grid: {
        hoverable: true,
        clickable: true
      }
    })
  }
  drawPieChart(placeholder, data);

  /**
  we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
  so that's not needed actually.
  */
  placeholder.data('chart', data);
  placeholder.data('draw', drawPieChart);



  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
  var previousPoint = null;

  placeholder.on('plothover', function(event, pos, item) {
    if (item) {
      if (previousPoint != item.seriesIndex) {
        previousPoint = item.seriesIndex;
        var tip = item.series['label'] + " : " + item.series['percent'] + '%';
        $tooltip.show().children(0).text(tip);
      }
      $tooltip.css({
        top: pos.pageY + 10,
        left: pos.pageX + 10
      });
    } else {
      $tooltip.hide();
      previousPoint = null;
    }

  });






  var d1 = [];
  for (var i = 0; i < Math.PI * 2; i += 0.5) {
    d1.push([i, Math.sin(i)]);
  }

  var d2 = [];
  for (var i = 0; i < Math.PI * 2; i += 0.5) {
    d2.push([i, Math.cos(i)]);
  }

  var d3 = [];
  for (var i = 0; i < Math.PI * 2; i += 0.2) {
    d3.push([i, Math.tan(i)]);
  }


  var sales_charts = $('#sales-charts').css({
    'width': '100%',
    'height': '220px'
  });
  $.plot("#sales-charts", [{
    label: "Domains",
    data: d1
  }, {
    label: "Hosting",
    data: d2
  }, {
    label: "Services",
    data: d3
  }], {
    hoverable: true,
    shadowSize: 0,
    series: {
      lines: {
        show: true
      },
      points: {
        show: true
      }
    },
    xaxis: {
      tickLength: 0
    },
    yaxis: {
      ticks: 10,
      min: -2,
      max: 2,
      tickDecimals: 3
    },
    grid: {
      backgroundColor: {
        colors: ["#fff", "#fff"]
      },
      borderWidth: 1,
      borderColor: '#555'
    }
  });


  $('#recent-box [data-rel="tooltip"]').tooltip({
    placement: tooltip_placement
  });

  function tooltip_placement(context, source) {
    var $source = $(source);
    var $parent = $source.closest('.tab-content')
    var off1 = $parent.offset();
    var w1 = $parent.width();

    var off2 = $source.offset();
    var w2 = $source.width();

    if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
    return 'left';
  }


  $('.dialogs,.comments').slimScroll({
    height: '300px'
  });


  //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
  //so disable dragging when clicking on label
  var agent = navigator.userAgent.toLowerCase();
  if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
    $('#tasks').on('touchstart', function(e) {
      var li = $(e.target).closest('#tasks li');
      if (li.length == 0) return;
      var label = li.find('label.inline').get(0);
      if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
    });

  $('#tasks').sortable({
    opacity: 0.8,
    revert: true,
    forceHelperSize: true,
    placeholder: 'draggable-placeholder',
    forcePlaceholderSize: true,
    tolerance: 'pointer',
    stop: function(event, ui) { //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
      $(ui.item).css('z-index', 'auto');
    }
  });
  $('#tasks').disableSelection();
  $('#tasks input:checkbox').removeAttr('checked').on('click', function() {
    if (this.checked) $(this).closest('li').addClass('selected');
    else $(this).closest('li').removeClass('selected');
  });


})
</script>
<div class="tooltip top in" style="top: 446px; left: 1051px; display: none;">
  <div class="tooltip-inner">social networks : 38.7%</div>
</div>
@endsection
