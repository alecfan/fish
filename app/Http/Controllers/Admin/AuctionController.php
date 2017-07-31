<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuctionController extends Controller
{

    /**
     * 显示拍卖列表界面
     */
    public function index()
    {
        $goods = DB::table('goods')->where('goods.is_auction', '=', '1')
            ->join('auction', 'goods.id', '=', 'auction.gid')
            ->join('users', 'goods.uid', '=', 'users.id')
            ->select('goods.id', 'goods.title', 'goods.description', 'goods.addtime', 'goods.status', 'auction.startprice', 'auction.cash', 'auction.incre', 'auction.starttime', 'auction.endtime', 'users.username')
            ->paginate(3);

        return view('admin.auction.index', [
            'goods' => $goods
        ]);
    }

    /**
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
     * 删除拍卖商品操作
     *
     * @param int $id
     */
    public function destroy($id)
    {
        //
        $a = DB::table('goods')->where('goods.id', $id)->delete();
        $b = $DB::table('goodspics')->where('gid', $id)->delete();
        $c = DB::table('auction')->where('gid', $id)->delete();

        if ($a && $b && $c) {
            return redirect('/admin/auction')->with('hasDel', 'ok');
        } else {
            return redirect('/admin/auction')->with('hasDel', 'failed');
        }
    }
}
