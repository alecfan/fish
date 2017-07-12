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
Route::get('/', function () {
    return view('welcome');
});

//后台
Route::group(['prefix' => 'admin'], function () {
    //后台首页
    Route::get('/index', 'Admin\IndexController@index');
    /*******************后台分类路由******************************/
    //分类管理
    Route::resource('/type', 'Admin\TypeController');
    //添加子分类
    Route::get('/typeson/{id}', 'Admin\TypeController@createSon');
    //运行添加子分类
    Route::post('/typeson', 'Admin\TypeController@storeSon');

    /******************后台商品路由*******************************/
    //商品管理
    Route::resource('/goods', 'Admin\TypeController');

});

//后台登录
Route::get('admin/login', 'Admin\LoginController@index');
