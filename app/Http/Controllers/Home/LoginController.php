<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    /**
     * 显示用户登录的界面
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        //
        return view('home.login.showLogin');
    }

    /**
     * 处理用户登录提交的表单
     *
     * @return \Illuminate\Http\Response
     */
    public function doLogin()
    {
        //
    }

    /**
     * 显示用户注册界面
     *
     * @return \Illuminate\Http\Response
     */
    public function showReg()
    {
        return view('home.login.showReg');
    }

    /**
     * 处理用户注册提交的表单
     *
     * @return \Illuminate\Http\Response
     */
    public function doReg()
    {
        //
    }
}
