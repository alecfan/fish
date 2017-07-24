<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * 显示前台首页
     */
    public function index()
    {
        // 查询分类
        $type = [];
        $tmp1 = DB::table('type')->where('pid', '0')->get();
        foreach ($tmp1 as $one) {
            $tmp2 = DB::table('type')->where('pid', $one->id)->get();
            foreach ($tmp2 as $two) {
                $type[$one->tname][$two->tname] = DB::table('type')->where('pid', $two->id)->get();
            }
        }

        // 查询母婴类别商品
        $muyinGoods = getGoods(14, 5);

        // 查询数码类型商品
        $shumaGoods = getGoods(1, 5);

        // 查询

        // 分配所有变量到主页
        return view('home.index.index', [
            'data' => $type,
            'muyinGoods' => $muyinGoods,
            'shumaGoods' => $shumaGoods
        ]);
    }

    /**
     * 分类列表显示页
     *
     * @param int $tid
     *            分类id
     */
    public function showList(int $tid)
    {
        $list = DB::table('goods')->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->where('goods.tid', $tid)
            ->where('goodspics.mpic', 1)
            ->select('goods.id', 'goods.price', 'goods.title', 'goodspics.picname')
            ->paginate(4);

        // dd($list);
        return view('home.index.list', [
            'list' => $list
        ]);
    }
}
