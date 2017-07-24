<?php
namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class DealController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('goods')->where('goods.uid', '=', '2')
            ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->where('goodspics.mpic', '=', '1')
            ->select('goods.*', 'goodspics.picname', 'goodspics.mpic')
            ->paginate(2);
        // paginate(3);
        // dd($list);

        return view('home.deal.deal', [
            'list' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods = DB::table('goods')->where('id', $id)->first();
        // dd($goods);
        return view('home.deal.dealedit', [
            'goods' => $goods
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 获取商品信息先存到商品表
        $arr = $request->except('_token', '_method', 'main', 'minor');
        $arr['addtime'] = time();

        // 商品信息入库，并获得该商品ID
        $list = DB::table('goods')->where('id', $id)->update($arr);

        // 判断主图，修改图片名，存入数据库
        if ($request->hasfile('main')) {
            if ($request->file('main')->isValid()) {
                // 生成上传文件对象
                $main = $request->file('main');
            }
            $ext = $main->getClientOriginalExtension();
            // 生成一个新文件名
            $mainname = time() . rand(1000, 9999) . '.' . $ext;
            // 移动文件
            if ($main->move('./home/images', $mainname)) {
                // 1.删除原图片记录
                DB::table('goodspics')->where('gid', $id)
                    ->where('mpic', 1)
                    ->delete();
                // 2.添加新图片记录到数据库
                $mainarr['gid'] = $id;
                $mainarr['picname'] = $mainname;
                $mainarr['mpic'] = 1;
                DB::table('goodspics')->where('gid', $id)
                    ->where('mpic', 1)
                    ->insert($mainarr);

                // 3.删除原图片
            }
        }

        // 判断详图，改名，入库
        // dd($request);
        if ($request->hasFile('minor')) {
            // 获取多图
            $count = $request->file('minor');
            // 1.删除原图片记录
            $main = DB::table('goodspics')->where('gid', $id)
                ->where('mpic', 0)
                ->delete();

            // 2.循环遍历插入图片
            foreach ($count as $minor) {
                $extt = $minor->getClientOriginalExtension(); // 原文件后缀
                $minorname = time() . rand(1000, 9999) . '.' . $extt; // 新文件名

                if ($minor->move('./home/images', $minorname)) {
                    // 2.添加新图片记录到数据库
                    // 获取新图片名
                    $minorarr['picname'] = $minorname;
                    $minorarr['gid'] = $id;
                    $minorarr['mpic'] = 0;

                    $main = DB::table('goodspics')->where('gid', $id)
                        ->where('mpic', 0)
                        ->insert($minorarr);
                }
            }
        }

        if ($list > 0) {
            return redirect('/deal')->with('msg', '修改成功');
        } else {
            return redirect('/deal')->with('error', '修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('goods')->where('id', $id)->delete();
        if ($res > 0) {
            return redirect('/deal')->with('msg', '删除成功');
        } else {
            return redirect('/deal')->with('error', '删除失败');
        }
    }
}
