<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    /**
     * [商品分类显示]
     * @param  Request $request [搜索请求参数]
     * @return [type]           [分类页面]
     */
    public function index(Request $request)
    {
        $where = [];
        //实例化需要的表
        $ob = DB::table('type');
        //dd($ob);
        //dd($request);
        // 判断请求中是否含有name字段
        if ($request->has('tname')) {
            // 获取搜索的条件
            $tname = $request->input('tname');
            //添加到将要带到分页中的数组
            $where['tname'] = $tname;
            //给查询语句添加where条件
            $ob->where('tname', 'like', '%' . $tname . '%');
        }
        //执行分页查询
        $list = $ob->paginate(3);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.type.index', ['list' => $list, 'where' => $where]);
    }

    /**
     * [添加分类页面显示]
     * @return [type] [description]
     */
    public function create()
    {
        return view('admin.type.add');
    }

    /**
     * [添加分类操作]
     * @param  Request $request [添加信息]
     * @return [type]           [返回分类列表页]
     */
    public function store(Request $request)
    {
        //自定义错误消息格式
        $messages = array(
            'tname.required' => '类别名必须填写',
            'tname.unique' => '分类已存在',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'tname' => 'required|unique:type',
        ], $messages);

        $arr = $request->except('_token');
        $ob = DB::table('type');
        $id = $ob->insertGetId($arr);
        if ($id > 0) {
            return redirect('/admin/type')->with('msg', '添加成功');
        }
    }

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {

    }

    /**
     * [修改页面显示]
     * @param  [type] $id [学要修改的ID]
     * @return [type]     [显示页面]
     */
    public function edit($id)
    {
        $type = DB::table('type')->where('id', $id)->first();
        return view('admin.type.edit', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  修改的内容
     * @param  需要修改的内容的id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arr = $request->except('_token', '_method');
        $res = DB::table('type')->where('id', $id)->update($arr);
        if ($res > 0) {
            return redirect('/admin/type')->with('msg', '修改成功');
        } else {
            return redirect('/admin/type')->with('error', '修改失败');
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
        $list = DB::table('type')->where('pid', $id)->first();
        if (count($list) > 0) {
            //如果有子分类，不能删除，直接跳转
            return redirect('admin/type')->with('error', '要删除这个分类需要先删除此分类下的子分类');
        }
        //执行删除
        $res = DB::table('type')->where('id', $id)->delete();
        if ($res > 0) {
            return redirect('/admin/type')->with('msg', '删除成功');
        } else {
            return redirect('/admin/type')->with('error', '删除失败');
        }
    }

    public function createSon($id)
    {

        //显示添加子分类的页面，带父分类显示出来
        $ob = DB::table('type')->where('id', $id)->first();
        //dd($ob);
        return view('admin.type.addSon', ['ob' => $ob]);
    }

    public function storeSon(Request $request)
    {
        //自定义错误消息格式
        $messages = array(
            'tname.required' => '分类名必须填写',
            'tname.unique' => '分类已存在',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'tname' => 'required|unique:type',
        ], $messages);

        $arr = $request->except('_token');
        //获取当前添加的子分类的父分类的信息
        $par = DB::table('type')->where('id', $request->input('pid'))->first();
        // 拼接出path字段
        $arr['path'] = $par->path . ',' . $arr['pid'];
        // 执行添加
        $id = DB::table('type')->insertGetId($arr);
        if ($id > 0) {
            return redirect('/admin/type')->with('msg', '添加成功');
        }
    }
}
