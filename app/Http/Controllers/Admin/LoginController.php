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
     * 后台登录页面
     * @return [type] [description]
     */
    public function index()
    {
        return view('admin.login.index');
    }

    /**
     * 后台登录操作
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function doLogin(Request $request)
    {
        $mycode = session('mycode');
        if ($mycode != $request->input('code')) {
            return back()->with('msg', '登录失败：验证码错误');
        }
        $username = $request->input('username');
        $ob = DB::table('users')->where('username', $username)->whereIn('admin', [1, 2])->first();
        if ($ob) {
            if (md5($request->input('password')) == $ob->password) {
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
     * 后台验证码
     * @return [type] [description]
     */
    public function code()
    {
        $code = new Vcode();
        $getCode = $code->getCode();
        session()->flash('mycode', $getCode);
        return response($code->doImg())->header('Content-type', 'image/jpeg');
    }

    /**
     * 后台用户退出操作
     * @return [type] [description]
     */
    public function quit()
    {
        session()->forget('adminuser');
        return redirect('admin/login');
    }
}
