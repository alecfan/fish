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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.index');
    }

    public function doLogin(Request $request)
    {
        $mycode = session('mycode');
        if ($mycode != $request->input('code')) {
            return back()->with('msg', '登录失败：验证码错误');
        }
        $username = $request->input('username');
        $ob = DB::table('users')->where('username', $username)->first();
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

    public function code()
    {
        $code = new Vcode();
        $getCode = $code->getCode();
        session()->flash('mycode', $getCode);
        return response($code->doImg())->header('Content-type', 'image/jpeg');
    }

    public function quit()
    {
        session()->forget('adminuser');
        return redirect('admin/login');
    }
}
