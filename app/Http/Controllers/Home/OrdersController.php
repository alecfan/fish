<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $usersadds = $request->input('adds');
        $adds = DB::table('usersadds')->where('id', $usersadds)->first();
        $order = $request->except('_token', 'adds');
        $order['orderid'] = time() . rand(100000, 999999);
        $order['addtime'] = time();
        $order['name'] = $adds->name;
        $order['address'] = $adds->province . $adds->city . $adds->county . $adds->info;
        $order['phone'] = $adds->phone;
        $order['buyer'] = session('userid');
        // dd($order);
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
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
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
