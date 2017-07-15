<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Org\Vcode;
use DB;
use Illuminate\Http\Request;
use session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * 显示后台登录界面
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.index');
    }

    public function doLogin(Request $request)
    {
        $vCode = session('vCode');
        if ($vCode != $request->input('code')) {
            return back()->with('msg', '登录失败：验证码错误');
        }
        $username = $request->input('username');
        $ob = DB::table('users')
            ->select('username', 'password', 'photo')
            ->where('username', $username)
            ->whereIn('admin', [1, 2])->first();
        if ($ob) {
            if (md5($request->input('password')) == $ob->password) {
                unset($ob->password);
                session()->put('adminuser', $ob);
                return redirect('admin/index');
            } else {
                return back()->with('msg', '登录失败：用户名或密码错误');
            }
        } else {
            return back()->with('msg', '登录失败：用户名或密码错误');
        }
    }

    /**
     * 获取验证码图片
     * @return \Illuminate\Http\Response 验证码图片
     */
    public function getVcode()
    {
        $code = new Vcode();
        $getCode = $code->getCode();
        session()->flash('vCode', $getCode);
        return response($code->doImg())->header('Content-type', 'image/jpeg');
    }

    /**
     * 登录退出
     * @return \Illuminate\Http\Response 页面跳转
     */
    public function quit()
    {
        session()->forget('adminuser');
        return redirect('admin/login');
    }
}
