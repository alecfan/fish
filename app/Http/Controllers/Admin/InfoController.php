<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    /**
     * 查询用户信息并返回
     */
    public function index()
    {
        // 获取登录的用户
        $username = session('adminuser')->username;
        $list = DB::table('users')->where('username', $username)->first();
        return view('admin.info.index', [
            'list' => $list
        ]);
    }

    /**
     * 修改用户信息
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $value = $request->input('value');
        $arr[$name] = $value;
        $list = DB::table('users')->where('id', $id)->update($arr);
        echo json_encode($list);
    }

    /**
     * 返回修改头像的页面
     */
    public function edit($id)
    {
        $list = DB::table('users')->where('id', $id)->first();
        return view('admin.info.edit', [
            'list' => $list
        ]);
    }

    /**
     * 执行修改头像的操作
     */
    public function update(Request $request, $id)
    {
        // 判断图片是否上传
        if ($request->hasFile('photo')) {
            // 判断是否有效
            if ($request->file('photo')->isValid()) {
                $photo = $request->file('photo');
            }
            // 获取后缀名
            $ext = $photo->getClientOriginalExtension();
            $picname = time() . rand(1000, 9999) . '.' . $ext;
            // 移动文件
            $photo->move('./home/upload', $picname);
            // 判断是否上传成功
            if ($photo->getError() > 0) {
                return redirect('/admin/info')->with('msg', '修改失败');
            } else {
                $arr['photo'] = $picname;
                DB::table('users')->where('id', $id)->update($arr);
                return redirect('/admin/info')->with('msg', '修改成功');
            }
        }
    }
}
