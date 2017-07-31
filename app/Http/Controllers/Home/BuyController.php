<?php
namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class BuyController extends Controller
{

    /**
     * Display a listing of the resource.
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
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = DB::table('orders')->where('id', $id)->delete();
        if ($res > 0) {
            return redirect('/sell')->with('msg', '删除成功');
        } else {
            return redirect('/sell')->with('error', '删除失败');
        }
    }

    public function showOrder($id)
    {
        $list = DB::table('orders')->where('id', $id)->first();

        // dd($list);
        return view('home.deal.order', [
            'list' => $list
        ]);
    }
}
