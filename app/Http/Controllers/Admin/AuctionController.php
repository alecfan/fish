<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AuctionController extends Controller
{

    /**
     * 显示拍卖列表界面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 从数据库查询数据
        $goods = DB::table('goods')->where('is_auction', '=', '1')
            ->join('auction', 'goods.id', '=', 'auction.gid')
            ->join('users', 'goods.uid', '=', 'users.id')
            ->select('goods.title', 'goods.description', 'goods.addtime', 'goods.status', 'auction.startprice', 'auction.cash', 'auction.incre', 'auction.starttime', 'auction.endtime', 'users.username')
            ->paginate(3);

        // dd($goods);
        return view('admin.auction.index', [
            'goods' => $goods
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 显示添加拍卖界面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auction.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {}

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
