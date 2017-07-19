<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * 查询用户数据并返回页面
     *
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        $where = [];
        // 获取普通用户和普通管理员
        $ob = DB::table('users')->whereIn('admin', [
            0,
            1
        ]);
        if ($request->has('username')) {
            $username = $request->input('username');
            $where['username'] = $username;
            $ob->where('username', 'like', '%' . $username . '%');
        }
        $list = $ob->paginate(3);
        return view('admin.user.index', [
            'list' => $list,
            'where' => $where
        ]);
    }

    /**
     * 返回用户添加页面
     *
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * 执行用户添加操作
     *
     * @param Request $request
     *            [请求数据]
     */
    public function store(Request $request)
    {
        $messages = array(
            'username.required' => '用户名必须填写',
            'password.required' => '密码必须填写',
            'username.unique' => '用户已存在',
            'password.min' => '密码长度不符合',
            'password.max' => '密码长度不符合'
        );
        // 表单自动验证
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required|min:6|max:18'
        ], $messages);
        $arr = $request->except('_token', 'password');
        $pass = $request->input('password');
        $pass = md5($pass);
        $arr['password'] = $pass;
        $list = DB::table('users')->insert($arr);
        if ($list) {
            return redirect('/admin/user')->with('msg', '添加成功');
        }
    }

    /**
     * 返回用户修改页面
     *
     * @param [type] $id
     *            [description]
     * @return [type] [description]
     */
    public function edit($id)
    {
        $list = DB::table('users')->where('id', $id)->first();
        return view('admin.user.edit', [
            'list' => $list
        ]);
    }

    /**
     * 执行修改操作
     *
     * @param Request $request
     *            [description]
     * @param [type] $id
     *            [description]
     * @return [type] [description]
     */
    public function update(Request $request, $id)
    {
        $pass = $request->input('password');
        // 判断是否需要修改密码，为空为不修改
        if (empty($pass)) {
            $arr = $request->only('login', 'admin');
        } else {
            $messages = array(
                'password.min' => '密码长度不符合',
                'password.max' => '密码长度不符合'
            );
            $this->validate($request, [
                'password' => 'min:6|max:18'
            ], $messages);
            $arr = $request->only('login', 'admin');
            $pass = md5($pass);
            $arr['password'] = $pass;
        }
        $list = DB::table('users')->where('id', $id)->update($arr);
        if ($list > 0) {
            return redirect('/admin/user')->with('msg', '修改成功');
        } else {
            return redirect('/admin/user')->with('error', '修改失败');
        }
    }

    /**
     * 执行用户删除操作
     *
     * @param [type] $id
     *            [description]
     * @return [type] [description]
     */
    public function destroy($id)
    {
        $list = DB::table('users')->where('id', $id)->delete();
        if ($list > 0) {
            return redirect('/admin/user')->with('msg', '删除成功');
        } else {
            return redirect('/admin/user')->with('error', '删除失败');
        }
    }
}
