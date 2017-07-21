<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

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
     */
    public function doLogin(Request $request)
    {
        // 验证用户输入数据
        $username = $request->input('username');
        $password = md5($request->input('password'));
        // 判断用户在数据中是否存在 FIXME查询用户字段筛选
        $user = DB::table('users')->where('username', $username)
            ->orWhere('phone', $username)
            ->orWhere('email', $username)
            ->first();

        if ($user && ($user->password == $password)) {
            // 存在
            unset($user->password);
            // 将用户数据保存至session中
            $request->session()->put('userid', $user->id);
            $request->session()->put('username', $user->username);
            $request->session()->put('photo', $user->photo);

            // redis中存储用户最后登录时间
            Redis::set($user->username . ':lastLogin', time());

            // 跳转至首页
            return redirect('/');
        } else {
            // 不存在
            // 返回登录页(带提示信息）
            return redirect('/login')->with('status', '用户名或密码错误，请重新登录。');
        }
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
     * 给用户发送短信验证码
     *
     * @param Request $request
     * @return boolean|string
     */
    public function sendSMS(Request $request)
    {
        // 获取用户发过来的手机号码
        $phone = $request->input('phone');
        $phoneCode = rand(1000, 9999); // 验证码
                                       // 给用户发送验证码
        $result = sendTemplateSMS($phone, array(
            $phoneCode,
            2
        ), 1);
        // 判断是否发送成功
        if ($result == NULL) {
            return false;
        }

        if ($result->statusCode != 0) {
            return 'fail';
        } else {
            // 将验证码存入redis
            $redis = new \Redis();
            $redis->connect('localhost', 6379);
            $redis->setex('phoneCode', 120, $phoneCode);
            $redis->close();

            // 将结果返回给前台
            return 'ok';
        }
    }

    /**
     * 验证用户输入的手机验证码
     */
    public function checkSMS(Request $request)
    {
        // 获取用户输入的验证码
        $inputCode = $request->input('inputCode');

        // 从缓存中取出验证码
        $redis = new \Redis();
        $redis->connect('localhost', 6379);
        $code = $redis->get('phoneCode');
        $redis->close();

        // 判断用户输入的验证码是否和缓存的一致
        if ($inputCode == $code) {
            return 'ok';
        } else {
            return 'fail';
        }
    }

    /**
     * 处理用户注册提交的表单
     *
     * @return \Illuminate\Http\Response
     */
    public function doReg(Request $request)
    {
        // TODO 验证用户输入数据
        // 将用户注册信息插入到数据库
        $phone = $request->input('phone');
        $password = md5($request->input('password'));
        $username = '新用户' . time() . rand(100, 999);
        $id = DB::table('users')->insertGetId([
            'phone' => $phone,
            'password' => $password,
            'username' => $username
        ]);
        // FIXME 注册成功跳转至登录页（待添加延时跳转功能）
        if ($id > 0) {
            return redirect('/login');
        }
    }

    /**
     */
    public function logout(Request $request)
    {
        // 销毁session
        $request->session()->forget('userid');
        $request->session()->forget('username');
        $request->session()->forget('photo');
        // 重新跳转至首页
        return redirect('/');
    }
}
