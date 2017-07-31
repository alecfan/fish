<?php
namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BuyController extends Controller
{

    /**
     * Display a listing of the resource.
     * 我买到的商品订单显示
     *
     * @return \Illuminate\Http\Response
     */
    public function showGood()
    {
        // dd($id);
        // $list = DB::table('orders')->get();
        // dd($list);
        // $list = DB::table('orders')->where('buyer', '=', '2')
        // ->join('goods', 'goods.id', '=', 'orders.gid')
        // ->join('goodspics', 'goodspics.gid', '=', 'goods.id')
        // ->where('goodspics.mpic', '=', 1)
        // ->select('orders.*', 'goodspics.picname', 'goodspics.mpic', 'goods.title')
        // ->paginate(2);
        // // dd($list);
        // return view('home.deal.buy', [
        // 'list' => $list
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     * 删除买过的订单
     *
     * @param int $id
     *            买过的订单号
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = DB::table('orders')->where('id', $id)->delete();
        if ($res > 0) {
            return redirect('/buy')->with('msg', '删除成功');
        } else {
            return redirect('/buy')->with('error', '删除失败');
        }
    }

    /**
     * 显示订单详情
     *
     * @param unknown $id
     *            商品订单id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function showOrder($id)
    {
        $list = DB::table('orders')->where('id', $id)->first();

        // dd($list);
        return view('home.deal.order', [
            'list' => $list
        ]);
    }
}
