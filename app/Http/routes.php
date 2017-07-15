<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */
//前台首页
Route::get('/', 'Home\IndexController@index');

//后台
Route::group(['prefix' => 'admin', 'middleware' => 'login'], function () {
    Route::get('/', function () {
        return 111;
    });
    //后台首页
    Route::get('/index', 'Admin\IndexController@index');
    /*******************后台分类路由******************************/
    //用户模块
    Route::post('/user/del', 'Admin\UserController@doDel');
    Route::resource('/user', 'Admin\UserController');
    //用户退出
    Route::get('/quit', 'Admin\LoginController@quit');
    //分类管理
    Route::resource('/type', 'Admin\TypeController');
    //添加子分类
    Route::get('/typeson/{id}', 'Admin\TypeController@createSon');
    //运行添加子分类
    Route::post('/typeson', 'Admin\TypeController@storeSon');
    //留言管理
    Route::resource('/comment', 'Admin\CommentController');

    /******************后台商品路由*******************************/
    //商品管理
    Route::resource('/goods', 'Admin\GoodsController');
    // 后台拍卖模块路由
    Route::resource('/auction', 'Admin\AuctionController');

});
//请求后台登录
Route::get('admin/login', 'Admin\LoginController@index');
Route::post('admin/login', 'Admin\LoginController@doLogin');
//请求验证码
Route::get('admin/getvcode/{tmp}', 'Admin\LoginController@getVcode');
