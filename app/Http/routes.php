<?php
/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */

// 前台首页显示
Route::get('/', 'Home\IndexController@index');
Route::get('/list/{tid}', 'Home\IndexController@showList');
// ===============前台=======用户登录注册开始==========================
// 登录显示
Route::get('/login', 'Home\LoginController@showLogin');
// 登录处理
Route::post('/login', 'Home\LoginController@doLogin');
// 注册显示
Route::get('/register', 'Home\LoginController@showReg');
// 注册发送短信
Route::post('/register/sendsms', 'Home\LoginController@sendSMS');
// 验证手机验证码
Route::post('/register/checksms', 'Home\LoginController@checkSMS');
// 注册处理
Route::post('/register', 'Home\LoginController@doReg');
// 注销
Route::get('/logout', 'Home\LoginController@logout');
// ===============前台=======用户登录注册结束==========================
// 前台用户个人中心首页显示
Route::get('/person', 'Home\PersonController@showIndex');
// 前台用户个人信息显示,修改
Route::get('/person/info', 'Home\PersonController@editInfo');
Route::post('/person/info', 'Home\PersonController@updateInfo');
// 用户收货地址添加，显示，修改，删除
Route::resource('/person/address', 'Home\AddressController');
// 用户商品管理，添加，显示，删除，修改
Route::resource('/person/goods', 'Home\GoodsController');
// ===============前台=======商品详情页显示===============
Route::get('/goods/{id}', 'Home\GoodController@showGood');
// 商品订单页面显示
Route::resource('/orders', 'Home\OrdersController');

// 后台
Route::group([
    'prefix' => 'admin',
    'middleware' => 'login'
], function () {

    // 后台首页
    Route::get('/index', 'Admin\IndexController@index');
    /**
     * *****************后台分类路由*****************************
     */
    // 个人资料
    Route::resource('/info', 'Admin\InfoController');
    Route::post('/info/create', 'Admin\InfoController@create');
    // 用户模块
    Route::post('/user/del', 'Admin\UserController@doDel');
    Route::resource('/user', 'Admin\UserController');
    // 用户退出
    Route::get('/quit', 'Admin\LoginController@quit');
    // 分类管理
    Route::resource('/type', 'Admin\TypeController');
    // 添加子分类
    Route::get('/typeson/{id}', 'Admin\TypeController@createSon');
    // 运行添加子分类
    Route::post('/typeson', 'Admin\TypeController@storeSon');
    // 留言管理
    Route::resource('/comment', 'Admin\CommentController');
    // 商品管理

    Route::resource('/goods', 'Admin\GoodsController');
    // 后台拍卖模块路由
    Route::resource('/auction', 'Admin\AuctionController');

    // 评论管理
    Route::resource('/comment', 'Admin\CommentController');

    /**
     * ***************后台个人资料路由***************************
     */
    Route::get('/self', 'Admin\SelfController@index');
});
/**
 * ********************后台登录路由********************************
 */
Route::get('admin/login', 'Admin\LoginController@index');
Route::post('admin/login', 'Admin\LoginController@doLogin');
// 请求后台登录
Route::get('admin/login', 'Admin\LoginController@index');
Route::post('admin/login', 'Admin\LoginController@doLogin');
// 请求验证码
Route::get('admin/getvcode/{tmp}', 'Admin\LoginController@getVcode');

