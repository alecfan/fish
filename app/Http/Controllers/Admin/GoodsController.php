<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class GoodsController extends Controller
{
    /**
     * [商品显示]
     * @param  Request $request [搜索请求参数]
     * @return [goods]           [商品显示页面]
     */
    public function index(request $request)
    {
        $where = [];

        $list = DB::table('goods')
            ->where('goods.is_auction','=',' 0')

            ->join('type', 'goods.tid', '=', 'type.id')
            ->join('users', 'goods.uid', '=', 'users.id')
            ->select('goods.*', 'type.tname','users.username');

         // dd($list);

        if ($request->has('title')) {
            // 获取搜索的条件
            $title = $request->input('title');
            //添加到将要带到分页中的数组
            $where['title'] = $title;
            //给查询语句添加where条件
            $list->where('title', 'like', '%' . $title . '%');
        }
        //执行分页查询
        $list = $list->paginate(6);

        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.goods.index', ['list' => $list,'where' => $where]);
    }


    /**
     * 添加商品页面
     * @param
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // DB:table(type)->


        return view('admin.goods.add');
    }


    /**
     * 商品添加操作
     *
     * @param  添加的内容
     * @return 返回添加好内容的列表页
     */
    public function store(Request $request)
    {
        //自定义错误消息格式
        $messages = array(
            'title.required' => '商品标题必须填写',

            'price.required' => '价格必须填写',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'title' => 'required|unique:goods',
            'price' => 'required',
        ], $messages);

        $arr = $request->except('_token');
        $ob = DB::table('goods');
        $id = $ob->insertGetId($arr);
        //dd($id);
        if ($id > 0) {
            return redirect('/admin/goods')->with('msg', '添加成功');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 商品修改操作
     *
     * @param  修改的id
     * @return 修改页面
     */
    public function edit($id)
    {
        $goods = DB::table('goods')->where('id', $id)->first();
        //dd($goods);

        return view('admin.goods.edit', ['goods' => $goods]);
    }

    /**
     * 商品修改操作
     *
     * @param  $request 修改的内容
     * @param  int  $id 修改内容的id
     * @return 返回修改成功的商品列表
     */
    public function update(Request $request, $id)
    {

        //自定义错误消息格式
        $messages = array(
            'title.required' => '商品标题必须填写',

            'price.required' => '价格必须填写',
        );

        //表单自动验证（用户提交的请求数据，验证规则，自定义的错误消息）
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required',
        ], $messages);

        $arr = $request->except('_token', '_method');
        if(isset($arr['status'])){
        }else{
            $arr['status'] = 1;
        }
        //dd($arr);
        $res = DB::table('goods')->where('id', $id)->update($arr);
        if ($res > 0) {
            return redirect('/admin/goods')->with('msg', '修改成功');
        } else {
            return redirect('/admin/goods')->with('error', '修改失败');
        }

    }

    /**
     * 删除操作
     *
     * @param  int  要删除的Id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $list = DB::table('goods')->where('id',$id)->first();
        //dd($list);
        $sale = $list->is_sale;
        //dd($sale);
        if ($sale == 0) {
            //如果有子分类，不能删除，直接跳转
            return redirect('admin/goods')->with('error', '该商品还未下架，不能删除');
        }
        //执行删除
        $res = DB::table('goods')->where('id', $id)->delete();
        if ($res > 0) {
            return redirect('/admin/goods')->with('msg', '删除成功');
        } else {
            return redirect('/admin/goods')->with('error', '删除失败');
        }
    }
}
