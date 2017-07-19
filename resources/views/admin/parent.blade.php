<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Fish后台管理系统</title>
  <meta name="keywords" content="闲鱼，二手交易" />
  <meta name="description" content="闲鱼，二手交易" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- 基本的css -->
  <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}" />
  <!-- 引入特定页面css -->
  @yield('basecss')
  <!-- ace模板css样式 -->
  <link rel="stylesheet" href="{{ asset('admin/css/ace.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/ace-rtl.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/ace-skins.min.css') }}" />
  <!-- ace settings handler -->
  <script src="{{ asset('admin/js/ace-extra.min.js') }}"></script>
</head>

<body>
  <div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
    try {
      ace.settings.check('navbar', 'fixed')
    } catch (e) {}
    </script>
    <div class="navbar-container" id="navbar-container">
      <div class="navbar-header pull-left">
        <a href="#" class="navbar-brand">
          <small>
              <i class="icon-leaf"></i>
              Fish后台管理系统
          </small>
        </a>
      </div>
      <div class="navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
          <li class="grey">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-tasks"></i>
              <span class="badge badge-grey">4</span>
            </a>
            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
              <li class="dropdown-header">
                <i class="icon-ok"></i> 还有4个任务完成
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">软件更新</span>
                    <span class="pull-right">65%</span>
                  </div>
                  <div class="progress progress-mini ">
                    <div style="width:65%" class="progress-bar "></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">硬件更新</span>
                    <span class="pull-right">35%</span>
                  </div>
                  <div class="progress progress-mini ">
                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">单元测试</span>
                    <span class="pull-right">15%</span>
                  </div>
                  <div class="progress progress-mini ">
                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">错误修复</span>
                    <span class="pull-right">90%</span>
                  </div>
                  <div class="progress progress-mini progress-striped active">
                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                    查看任务详情
                    <i class="icon-arrow-right"></i>
                  </a>
              </li>
            </ul>
          </li>
          <li class="purple">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-bell-alt icon-animated-bell"></i>
              <span class="badge badge-important">8</span>
            </a>
            <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
              <li class="dropdown-header">
                <i class="icon-warning-sign"></i> 8条通知
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                        新闻评论
                      </span>
                    <span class="pull-right badge badge-info">+12</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="btn btn-xs btn-primary icon-user"></i> 切换为编辑登录..
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
                        新订单
                      </span>
                    <span class="pull-right badge badge-success">+8</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="clearfix">
                    <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-info icon-twitter"></i>
                        粉丝
                      </span>
                    <span class="pull-right badge badge-info">+11</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                    查看所有通知
                    <i class="icon-arrow-right"></i>
                  </a>
              </li>
            </ul>
          </li>
          <li class="green">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-envelope icon-animated-vertical"></i>
              <span class="badge badge-success">5</span>
            </a>
            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
              <li class="dropdown-header">
                <i class="icon-envelope-alt"></i> 5条消息
              </li>
              <li>
                <a href="#">
                  <img src="{{ asset('admin/avatars/avatar.png') }}" class="msg-photo" alt="Alex's Avatar" />
                  <span class="msg-body">
                      <span class="msg-title">
                        <span class="blue">Alex:</span> 不知道写啥 ...
                  </span>
                  <span class="msg-time">
                        <i class="icon-time"></i>
                        <span>1分钟以前</span>
                  </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="{{ asset('admin/avatars/avatar3.png') }}" class="msg-photo" alt="Susan's Avatar" />
                  <span class="msg-body">
                      <span class="msg-title">
                        <span class="blue">Susan:</span> 不知道翻译...
                  </span>
                  <span class="msg-time">
                        <i class="icon-time"></i>
                        <span>20分钟以前</span>
                  </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="{{ asset('admin/avatars/avatar4.png') }}" class="msg-photo" alt="Bob's Avatar" />
                  <span class="msg-body">
                      <span class="msg-title">
                        <span class="blue">Bob:</span> 到底是不是英文 ...
                  </span>
                  <span class="msg-time">
                        <i class="icon-time"></i>
                        <span>下午3:15</span>
                  </span>
                  </span>
                </a>
              </li>
              <li>
                <a href="inbox.html">
                    查看所有消息
                    <i class="icon-arrow-right"></i>
                  </a>
              </li>
            </ul>
          </li>
          <li class="light-blue">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="{{ asset('admin/images/upload') }}/{{ session('adminuser')->photo }}" alt="" />
              <span class="user-info">
                  <small>欢迎光临</small>
                  {{ session('adminuser')->username }}
                </span>
              <i class="icon-caret-down"></i>
            </a>
            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="#">
                  <i class="icon-cog"></i> 设置
                </a>
              </li>
              <li>
                <a href="{{ url('admin/info') }}">
                  <i class="icon-user"></i> 个人资料
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ url('admin/quit') }}">
                  <i class="icon-off"></i> 退出
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- /.ace-nav -->
      </div>
      <!-- /.navbar-header -->
    </div>
    <!-- /.container -->
  </div>
  <div class="main-container" id="main-container">
    <script type="text/javascript">
    try {
      ace.settings.check('main-container', 'fixed')
    } catch (e) {}
    </script>
    <div class="main-container-inner">
      <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
      </a>
      <!-- 侧边条开始 -->
      <div class="sidebar" id="sidebar">
        <script type="text/javascript">
        try {
          ace.settings.check('sidebar', 'fixed')
        } catch (e) {}
        </script>
        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
              <i class="icon-signal"></i>
            </button>
            <button class="btn btn-info">
              <i class="icon-pencil"></i>
            </button>
            <button class="btn btn-warning">
              <i class="icon-group"></i>
            </button>
            <button class="btn btn-danger">
              <i class="icon-cogs"></i>
            </button>
          </div>
          <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
          </div>
        </div>
        <ul class="nav nav-list">
          <li @yield( 'indexActive')>
            <a href="/admin/index">
              <i class="icon-dashboard"></i>
              <span class="menu-text"> 控制台 </span>
            </a>
          </li>
          <!-- 用户管理开始 -->
          <li @yield( 'usersOpen')>
            <a href="" class="dropdown-toggle">
              <i class="icon-user"></i>
              <span class="menu-text"> 用户管理 </span>
              <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu" @yield( 'usersShow')>
              <li @yield( 'usersListActive')>
                <a href="/admin/user">
                  <i class="icon-double-angle-right"></i> 用户列表
                </a>
              </li>
              <li @yield( 'usersAddActive')>
                <a href="/admin/user/create">
                  <i class="icon-double-angle-right"></i> 添加用户
                </a>
              </li>
            </ul>
          </li>
          <!-- 用户管理结束 -->
          <!-- 商品管理开始 -->
          <li @yield( 'goodsOpen')>
            <a href="#" class="dropdown-toggle">
              <i class="icon-reorder"></i>
              <span class="menu-text"> 商品管理 </span>
              <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu" @yield( 'goodsShow')>
              <li @yield( 'goodsListActive')>
                <a href="/admin/goods">
                  <i class="icon-double-angle-right"></i> 商品列表
                </a>
              </li>
              <li @yield( 'goodsAddActive')>
                <a href="/admin/goods/create">
                  <i class="icon-double-angle-right"></i> 添加商品
                </a>
              </li>
            </ul>
          </li>
          <!-- 商品管理结束 -->
          <!-- 分类管理开始 -->
          <li @yield( 'typeOpen')>
            <a href="#" class="dropdown-toggle">
              <i class="icon-sitemap"></i>
              <span class="menu-text"> 分类管理 </span>
              <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu" @yield( 'typeShow')>
              <li @yield( 'typeListActive')>
                <a href="/admin/type">
                  <i class="icon-double-angle-right"></i> 分类列表
                </a>
              </li>
              <li @yield( 'typeAddActive')>
                <a href="/admin/type/create">
                  <i class="icon-double-angle-right"></i> 添加分类
                </a>
              </li>
            </ul>
          </li>
          <!-- 分类管理结束 -->
          <!-- 拍卖管理开始 -->
          <li @yield( 'auctionActive')>
            <a href="/admin/auction">
              <i class="icon-legal"></i>
              <span class="menu-text"> 拍卖管理 </span>
            </a>
          </li>
          <!-- 拍卖管理结束 -->
          <!-- 商品评论开始 -->
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-comment"></i>
              <span class="menu-text"> 商品评论 </span>
              <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
              <li>
                <a href="/admin/user">
                  <i class="icon-double-angle-right"></i> 消息列表
                </a>
              </li>
            </ul>
          </li>
          <!-- 商品评论结束 -->
          <!-- 用户消息开始 -->
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-envelope"></i>
              <span class="menu-text"> 用户消息 </span>
              <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
              <li>
                <a href="/admin/user">
                  <i class="icon-double-angle-right"></i> 广告列表
                </a>
              </li>
              <li>
                <a href="/admin/user/create">
                  <i class="icon-double-angle-right"></i> 添加广告
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-list"></i>
              <span class="menu-text"> 留言管理 </span>
              <b class="arrow icon-angle-down"></b>
            </a>
            <ul class="submenu">
              <li>
                <a href="/admin/comment">
                  <i class="icon-double-angle-right"></i> 留言列表
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-list"></i>
              <span class="menu-text"> 友情链接</span>
              <b class="arrow icon-angle-down"></b>
            </a>
          </li>
          <li>
            <a href="#" class="dropdown-toggle">
              <i class="icon-cog"></i>
              <span class="menu-text"> 站点设置 </span>
            </a>
          </li>
        </ul>
        <div class="sidebar-collapse" id="sidebar-collapse">
          <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
        </div>
        <script type="text/javascript">
        try {
          ace.settings.check('sidebar', 'collapsed')
        } catch (e) {}
        </script>
      </div>
      <!-- 侧边条结束 -->
      <!-- 内容页开始 -->
      <div class="main-content">
        <!-- 面包导航开始 -->
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">
          try {
            ace.settings.check('breadcrumbs', 'fixed')
          } catch (e) {}
          </script>
          <ul class="breadcrumb">
            <li>
              <i class="icon-home home-icon"></i>
              <a href="/admin/index">主页</a>
            </li>
            @yield('parentPath') @yield('path')
          </ul>
        </div>
        <!-- 面包导航结束 -->
        @yield('content')
      </div>
      <!-- 内容页结束 -->
    </div>
    <!-- /.main-container-inner -->
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
  </div>
  <!-- 基本的JS -->
  <script src="{{ asset('admin/js/jquery-2.0.3.min.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/typeahead-bs2.min.js') }}"></script>
  <!-- 页面指定的js -->
  @yield('basejs')
  <!-- ace js -->
  <script src="{{ asset('admin/js/ace-elements.min.js') }}"></script>
  <script src="{{ asset('admin/js/ace.min.js') }}"></script>
  <!-- 根据这个页面的行内js -->
  @yield('inlinejs')
</body>

</html>
