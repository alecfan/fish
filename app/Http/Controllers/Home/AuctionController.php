<?php
namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AuctionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        // 获取商品信息
        $arr = $request->only('title', 'description', 'tid');
        $arr['addtime'] = time();
        $arr['uid'] = 2;
        $arr['price'] = $request->input('startprice');
        $arr['is_auction'] = 1;
        // 获取拍卖信息
        $auction = $request->only('startprice', 'cash', 'incre');
        $auction['starttime'] = strtotime($request->input('starttime'));
        $auction['endtime'] = strtotime($request->input('endtime'));
        // 主图上传
        if ($request->file('main')->isValid()) {
            // 生成上传文件对象
            $main = $request->file('main');
        }
        $ext = $main->getClientOriginalExtension();
        // 生成一个新文件名
        $mainname = time() . rand(1000, 9999) . '.' . $ext;
        // 移动文件
        $main->move('./home/images', $mainname);
        // 判断上传是否成功
        if ($main->getError() > 0) {
            return redirect('/')->with('update', '发布失败');
        } else {
            // 商品信息入库，并获得该商品ID
            $gid = DB::table('goods')->insertGetId($arr);
            $auction['gid'] = $gid;
            DB::table('auction')->insert($auction);
            // 获取主图入库的数据
            $mainarr['gid'] = $gid;
            $mainarr['picname'] = $mainname;
            $mainarr['mpic'] = 1;
            DB::table('goodspics')->insert($mainarr);

            // 获取多图
            $count = $request->file('minor');
            // 判断是否上传多图
            if ($count[0]) {
                foreach ($count as $minor) {
                    $extt = $minor->getClientOriginalExtension();
                    $minorname = time() . rand(1000, 9999) . '.' . $extt;
                    // 移动文件
                    $minor->move('./home/images', $minorname);
                    if ($minor->getError() > 0) {
                        return redirect('/')->with('update', '发布失败');
                    } else {
                        // 获取多图入库的数据
                        $minorarr['gid'] = $gid;
                        $minorarr['picname'] = $minorname;
                        DB::table('goodspics')->insert($minorarr);
                    }
                }
            }
            return redirect('/')->with('update', '发布成功');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
