<?php
/****************************************
 * FileName : IndexController.php
 * Author : Zhuyunfei
 * Date : 2017-07-30
 * Description : 前台首页模块控制器
 ***************************************/
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Org\Page;

class IndexController extends Controller
{

    /**
     * 显示前台首页
     */
    public function index()
    {
        // 所有分类组成的三维数组
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
            ->where('auction.endtime', '>', time())
            ->where('goodspics.mpic', 1)
            ->select('goods.id', 'goods.title', 'goods.price', 'auction.endtime', 'goodspics.picname')
            ->get();

        // 查询母婴类别商品
        $muyinGoods = getGoods(14, 5);

        // 查询数码类型商品
        $shumaGoods = getGoods(1, 5);

        // 今日推荐
        $todays = DB::table('goods')->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->where('goods.is_auction', 0)
            ->where('goods.tid', 27)
            ->select('goods.title', 'goods.description', 'goodspics.picname', 'goods.id')
            ->first();

        // 加载模板(同时分配变量到模板)
        return view('home.index.index', [
            'data' => $type,
            'muyinGoods' => $muyinGoods,
            'shumaGoods' => $shumaGoods,
            'auction' => $auction,
            'todays' => $todays
        ]);
    }

    /**
     * 显示分类搜索列表页
     */
    public function searchGoods(Request $request)
    {
        // 分配到模板的参数数组
        $list = [];

        // 初始化商品model对象
        $db = DB::table('goods')->join('users', 'goods.uid', '=', 'users.id')
            ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->select('goods.id', 'goods.price', 'goods.title', 'goods.tid', 'goodspics.picname', 'users.username', 'users.photo')
            ->where('goodspics.mpic', 1)
            ->where('goods.status', 0)
            ->where('goods.is_auction', 0);

        // 如果有关键字搜索,增加搜索条件
        if ($request->has('keyword')) {
            $keyword = $request->input('keyword'); // 获取搜索关键字
            $arr = DB::table('fenci')->where('title', $keyword)->get();
            if ($arr) {
                foreach ($arr as $v) {
                    $gid[] = $v->gid; // 获取该关键字对应的所有gid
                }
                $db->whereIn('goods.id', $gid); // 关联去查分词表
                $list['keyword'] = $request->input('keyword');
            } else {
                $db->whereIn('goods.id', 0);
            }
        }

        // 如果有分类条件,增加分类搜索条件
        if ($request->has('tid')) {
            $tid = $request->get('tid');
            $db->where('goods.tid', $tid);
            $list['tid'] = $tid;
        }

        // 商品排序
        if ($request->has('sort')) {
            if ($request->input('sort') == 'addtime') {
                $db->orderBy('goods.addtime', 'desc');
                $list['sort'] = $request->input('sort');
            } else {
                $db->orderBy('goods.price', 'desc');
                $list['sort'] = $request->input('price');
            }
        }

        // 分页
        $tmpgoods = $db->get(); // 返回的是数组
        if ($tmpgoods) {
            $total = count($tmpgoods); // 总条数
            $num = 3; // 每页显示条数
            $page = new Page($total, $num);
            $page->page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page->page - 1) * $num; // 开始索引
            $end = $start + $num; // 结束索引

            for ($i = $start; $i < ($end > $total ? $total : $end); $i ++) {
                $goods[] = $tmpgoods[$i];
            }

            $list['goods'] = $goods;
            $list['page'] = $page;
        } else {
            $list['goods'] = $tmpgoods;
            $page = new Page(0, 3);
            $list['page'] = $page;
        }

        // 获取所有的三级分类
        $types = DB::table('type')->get();
        $type3 = [];
        foreach ($types as $type) {
            $arr = explode(',', $type->path);
            if (count($arr) == 3) {
                $type3[] = $type;
            }
        }
        $list['type3'] = $type3;

        // 加载模板(同时分配变量到模板)
        return view('home.index.search', $list);
    }
}
