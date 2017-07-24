<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

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
        // 获取拍卖的商品
        $auction = DB::table('goods')->where('goods.is_auction', 1)
            ->join('auction', 'auction.gid', '=', 'goods.id')
            ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->where('goodspics.mpic', 1)
            ->get();
        // 查询母婴类别商品
        $muyinGoods = getGoods(14, 5);

        // 查询数码类型商品
        $shumaGoods = getGoods(1, 5);

        // 查询

        // 分配所有变量到主页
        return view('home.index.index', [
            'data' => $type,
            'muyinGoods' => $muyinGoods,
            'shumaGoods' => $shumaGoods,
            'auction' => $auction
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

        return view('home.index.list', [
            'list' => $list
        ]);
    }

    /**
     * 商品搜索
     */
    public function searchGoods(Request $request, $tid = null, $staddtime = null)
    {
        // 分析：根据商品关键字搜索keyword，根据发布用户名搜索username，根据分类搜索tid，默认排序st_trust=1，最新发布时间排序st_edtime=1，根据价格排序st_price=1|0
        $db = DB::table('goods')->join('users', 'goods.uid', '=', 'users.id')
            ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->select('goods.id', 'goods.price', 'goods.title', 'goods.tid', 'goodspics.picname', 'users.username', 'users.photo')
            ->where('goodspics.mpic', 1);

        // 判断关键字搜索条件
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword'); // 获取搜索关键字
            $arr = DB::table('fenci')->where('title', $keyword)->get();
            if ($arr) {
                foreach ($arr as $v) {
                    $gid[] = $v->gid; // 获取该关键字对应的所有gid
                }
                $db->whereIn('goods.id', $gid); // 关联去查分词表
            }
        }

        // 判断用户搜索条件
        if ($request->has('username')) {
            $username = $request->input('username');
            $db->join('users', 'goods.uid', 'users.id')->where('users.username', $username);
        }

        // 判断分类条件
        if (isset($tid)) {
            $db->where('goods.tid', $tid);
        }

        // 商品添加时间排序
        if (isset($staddtime)) {
            $db->orderBy('goods.addtime', 'desc');
        }

        // 商品价格排序
        // if (isset($stprice)) {
        // if ($stprice == '1') {
        // $db->orderBy('goods.price', 'asc');
        // } else {
        // $db->orderBy('goods.price', 'desc');
        // }
        // }

        // 查询商品
        $goods = $db->get(); // 返回数组（空就为空数组）

        // dd($goods);

        // 准备条件数组sear分配到模板
        if (isset($keyword)) {
            $sear['keyword'] = $keyword;
        }
        if (isset($username)) {
            $sear['username'] = $username;
        }
        if (isset($tid)) {
            $sear['tid'] = $tid;
        }

        return view('home.index.search', [
            'tid' => $tid,
            'goods' => $goods
        ]);
    }
}
