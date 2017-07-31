<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrdersController extends Controller
{

    /**
     * 生成订单
     */
    public function store(Request $request)
    {
        $usersadds = $request->input('adds');
        $adds = DB::table('usersadds')->where('id', $usersadds)->first();
        $order = $request->except('_token', 'adds');
        $order['orderid'] = time() . rand(100000, 999999);
        $order['addtime'] = time();
        $order['name'] = $adds->name;
        $order['address'] = $adds->province . $adds->city . $adds->county . $adds->info;
        $order['phone'] = $adds->phone;
        $order['buyer'] = session('userid');
        $list = DB::table('orders')->insert($order);
        if ($list) {
            DB::table('goods')->where('id', $request->input('gid'))
                ->update([
                'status' => 3
            ]);
        }
        return view('home.orders.success', [
            'order' => $order
        ]);
    }

    /**
     * 生成订单页面显示
     */
    public function show($id)
    {
        $goods = DB::table('goods')->where('id', $id)->first();
        $usersadds = DB::table('usersadds')->where('uid', $goods->uid)->get();
        return view('home.orders.showOrders', [
            'goods' => $goods,
            'usersadds' => $usersadds
        ]);
    }
}
