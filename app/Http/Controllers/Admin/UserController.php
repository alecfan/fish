<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 查询用户数据并返回页面
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        $where = [];
        $ob = DB::table('fish_users');
        if ($request->has('name')) {
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name', 'like', '%' . $name . '%');
        }
        // dd($where);
        $list = $ob->paginate(3);
        return view('admin.user.index', ['list' => $list, 'where' => $where]);
    }

    /**
     *返回用户添加页面
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * 将用户数据插入到数据库
     * @param  Request $request [请求数据]
     */
    public function store(Request $request)
    {
        $messages = array(
            'name.required' => '用户名必须填写',
            'pass.required' => '密码必须填写',
            'age.required' => '年龄必须填写',
            'name.unique' => '用户已存在',
            'pass.size' => '密码长度不符合',
            'age.integer' => '年龄必须为数字',
        );
        //表单自动验证
        $this->validate($request, [
            'name' => 'required|unique:user',
            'pass' => 'required|size:6-18',
            'age' => 'required|integer',
        ], $messages);

        $arr = $request->except('_token');
        $list = DB::table('user')->insert($arr);
        if ($list) {
            return redirect('/admin/user')->with('msg', '添加成功');
        }
    }

    public function show($id)
    {
        //
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $list = DB::table('user')->where('id', $id)->first();
        return view('admin.user.edit', ['list' => $list]);
    }

    /**
     *
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        $arr = $request->except('_token', '_method');
        if ($arr['uname'] == $arr['name']) {
            $messages = array(
                'name.required' => '用户名必须填写',
                'pass.required' => '密码必须填写',
                'age.required' => '年龄必须填写',
                'pass.min' => '密码长度不符合',
                'age.integer' => '年龄必须为数字',
            );
            $this->validate($request, [
                'name' => 'required',
                'pass' => 'required|min:6',
                'age' => 'required|integer',
            ], $messages);
        } else {
            $messages = array(
                'name.required' => '用户名必须填写',
                'pass.required' => '密码必须填写',
                'age.required' => '年龄必须填写',
                'name.unique' => '用户已存在',
                'pass.min' => '密码长度不符合',
                'age.integer' => '年龄必须为数字',
            );
            $this->validate($request, [
                'name' => 'required|unique:user',
                'pass' => 'required|min:6',
                'age' => 'required|integer',
            ], $messages);
        }
        $arr = $request->except('_token', '_method', 'uname');
        $list = DB::table('user')->where('id', $id)->update($arr);
        if ($list > 0) {
            return redirect('/admin/user')->with('msg', '修改成功');
        } else {
            return redirect('/admin/user')->with('error', '修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = DB::table('user')->where('id', $id)->delete();
        if ($list > 0) {
            return redirect('/admin/user')->with('msg', '删除成功');
        } else {
            return redirect('/admin/user')->with('error', '删除失败');
        }
    }
}
