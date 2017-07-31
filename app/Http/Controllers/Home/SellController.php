<?php
namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SellController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGood()
    {
        // $list = DB::table('goods')->where('goods.uid', '=', '2')
        // ->where('goods.status', '=', '3')
        // ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
        // ->select('goods.*', 'goodspics.picname', 'goodspics.mpic')
        // ->where('goodspics.mpic', '=', '1')
        // ->paginate(2);

        // // paginate(3);

        // return view('home.deal.sell', [
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
        $res = DB::table('goods')->where('id', $id)->delete();
        if ($res > 0) {
            return redirect('/sell')->with('msg', '删除成功');
        } else {
            return redirect('/sell')->with('error', '删除失败');
        }
    }
}
