<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CollectController extends Controller
{

    /**
     * 显示用户所有的收藏
     */
    public function index()
    {
        $collects = DB::table('goodscollect')->leftjoin('goods', 'goodscollect.gid', '=', 'goods.id')
            ->leftjoin('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->select('goods.id as goodid', 'goods.title', 'goods.price', 'goodspics.picname', 'goods.locate')
            ->where('goodspics.mpic', 1)
            ->where('goodscollect.uid', session('userid'))
            ->get();

        // dd($collects);

        return view('home.collect.showCollect', [
            'collects' => $collects
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
     * 用户收藏商品
     */
    public function store(Request $request)
    {
        $uid = $request->input('uid'); // 用户id
        $gid = $request->input('gid'); // 商品id

        $id = DB::table('goodscollect')->insertGetId([
            'uid' => $uid,
            'gid' => $gid,
            'time' => time()
        ]);

        if ($id > 0) {
            return 1;
        } else {
            return 0;
        }
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
     * 用户取消商品收藏
     */
    public function destroy(Request $request)
    {
        $uid = $request->input('uid'); // 用户id
        $gid = $request->input('gid'); // 商品id

        $id = DB::table('goodscollect')->where('uid', $uid)
            ->where('gid', $gid)
            ->delete();

        if ($id > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
