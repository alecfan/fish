<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{

    /**
     * 显示前台用户个人中心首页
     *
     * @return \Illuminate\Http\Response
     */
    public function showIndex()
    {
        $list = DB::table('users')->where('id', 3)->get();

        // dd($list);
        return view('home.person.showIndex', [
            'list' => $list
        ]);
    }

    /**
     * 显示个人资料修改页面
     */
    public function editInfo()
    {
        // TODO id需改
        $list = DB::table('users')->where('id', 3)->get();

        return view('home.person.editInfo', [
            'list' => $list
        ]);
    }

    public function UpdateInfo(request $request)
    {
        $messages = array(

            'username.unique' => '用户已存在',
            'username.required' => '用户名必须填写'
        );
        // 表单自动验证
        $this->validate($request, [
            'username' => 'unique:users',
            'username' => 'required:username'
        ], $messages);
        // dd($request);
        // $old = $request->input('image');
        // dd($old);
        $arr = $request->except('_token', 'image');
        // dd($arr);
        if ($request->hasFile('photo')) {
            // 判断文件是否有效
            if ($request->file('photo')->isValid()) {
                // 生成上传文件对象
                $file = $request->file('photo');
            }
            // 获取源文件的后缀
            $ext = $file->getClientOriginalExtension();

            // 生成一个新文件名
            $picname = time() . rand(1000, 9999) . '.' . $ext;
            // dd($picname);
            // 移动文件
            $file->move('./home/upload', $picname);
            $arr['photo'] = $picname;
            // dd($arr);
            // dd($file->getError());

            if ($file->getError() > 0) {

                echo '上传失败';
            } else {

                echo '上传成功';
            }
        }

        if (array_key_exists('birthday', $arr)) {
            echo $arr['birthday'] = strtotime($arr['birthday']);
        }

        $res = DB::table('users')->where('id', 3)->update($arr);
        // unlink('./home/upload/' . $old);

        if ($res > 0) {
            return redirect('/person/info')->with('msg', '修改成功');
        } else {
            return redirect('/person/info')->with('error', '修改失败');
        }
    }
}