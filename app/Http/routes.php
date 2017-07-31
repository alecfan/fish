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

/*
 * *****************前***台*******************************
 */
// ===============首页显示=======================
Route::get('/', 'Home\IndexController@index');
Route::get('/list/{tid}', 'Home\IndexController@showList');
// ==============商品搜索页================================
Route::post('/search', 'Home\IndexController@searchGoods');
Route::get('/search', 'Home\IndexController@searchGoods');

// ============== 商品详情页============================
Route::get('/goods/{id}', 'Home\GoodController@showGood');

// ==============用户登录注册==========================
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
// ===============个人中心显示=============================
Route::get('/person', 'Home\PersonController@showIndex');
// 显示个人信息
Route::get('/person/info', 'Home\PersonController@editInfo');
// 修改个人信息
Route::post('/person/info', 'Home\PersonController@updateInfo');
// 显示用户发布商品
Route::get('/person/selling', 'Home\PersonController@showSelling');
// 显示用户卖出商品
Route::get('/person/sold', 'Home\PersonController@showSold');
// 显示用户买到商品
Route::get('/person/bought', 'Home\PersonController@showBought');
// ==============TODO用户信息管理=========================
// ==============用户收货地址管理==========================
Route::resource('/person/address', 'Home\AddressController');
// ================用户商品管理============================
Route::resource('/person/goods', 'Home\GoodsController');

// ================用户订单管理============================
Route::resource('/orders', 'Home\OrdersController');
// ================商品收藏管理============================
// 显示
Route::get('/person/collect', 'Home\CollectController@index');
// 存储
Route::post('/collect', 'Home\CollectController@store');
// 删除
Route::post('/cancelcollect', 'Home\CollectController@destroy');
// ================商品足迹管理==============================
// 显示浏览足迹
Route::get('/home/person/foot', 'Home\PersonController@foot');
// ================商品评论管理==============================
// 显示用户商品评论
Route::get('/home/person/comment', 'Home\CommentController@index');
// 存储商品评论
Route::post('/comment', 'Home\CommentController@store');
// ================商品拍卖管理===============================
Route::post('/person/auction', 'Home\AuctionController@index');

// 用户的交易 FIXME 写到商品模块或订单模块中

// ===============前台=======商品详情页显示===============
Route::get('/goods/{id}', 'Home\GoodController@showGood');
// 竞拍
Route::get('/auction/increase', 'Home\AuctionController@doIncrease');
// 拍卖商品详情显示
Route::get('/auction/{id}', 'Home\AuctionController@showAuction');
// 用户的交易 显示，修改，删除

Route::resource('/deal', 'Home\DealController');
Route::post('/sell/{id}', 'Home\SellController@delete');

// 买到的商品 FIXME 写到商品模块或订单模块中
Route::post('/buy/{id}', 'Home\BuyController@delete');
Route::get('/orderinfo/{id}', 'Home\BuyController@showOrder');

/*
 * ******************后****台**************************************
 */
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
    Route::post('/user/doDel', 'Admin\UserController@doDel');
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

