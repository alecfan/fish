<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class GoodController extends Controller
{

    /**
     * 显示商品详情页
     */
    public function showGood($gid)
    {
        // 商品信息
        $good = DB::table('goods')->join('users', 'users.id', '=', 'goods.uid')
            ->select('goods.*', 'users.id as users_id', 'users.photo', 'users.username')
            ->where('goods.id', $gid)
            ->first();
        // 其他图片
        $goodpics = DB::table('goodspics')->where('gid', $good->id)
            ->where('mpic', '<>', 1)
            ->get();
        // 主图
        $mpic = DB::table('goodspics')->where('gid', $good->id)
            ->where('mpic', 1)
            ->first();
        // 商品评论
        $comments = DB::table('comment')->join('users', 'comment.uid', '=', 'users.id')
            ->where('gid', $good->id)
            ->get();

        // dd($good);
        // 猜你喜欢
        $likes = DB::table('goods')->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->where('goods.tid', $good->tid)
            ->where('goods.id', '<>', $good->id)
            ->get();
        // dd($likes);

        // 发布该商品的用户最后登录时间
        $userLastLogin = Redis::get($good->username . ':lastLogin');
        $time = time() - $userLastLogin;
        if ($time < 60) {
            $timeMess = '刚刚';
        } elseif ($time > 60 && $time < 3600) {
            $timeMess = ceil($time / 60) . '分钟之前';
        } else {
            $timeMess = ceil($time / 60 / 60) . '小时之前';
        }

        // 商品是否被收藏
        // 判断是哪个用户登录的
        $uid = session()->get('userid');
        $res = DB::table('goodscollect')->where('uid', $uid)
            ->where('gid', $good->id)
            ->first();
        if ($res) {
            $isCollect = 1;
        } else {
            $isCollect = 0;
        }

        // step 如果是登录用户，记录用户浏览商品的足迹
        if (session()->has('userid')) {
            $uid = session()->get('userid'); // 用户id

            // 1.先看数据库中是否有这个用户对这个商品的浏览记录?
            $record = DB::table('footprint')->where('uid', $uid)
                ->where('gid', $gid)
                ->first();
            if ($record) {
                // 如果有记录那么更新time字段
                DB::table('footprint')->where('id', $record->id)->update([
                    'time' => time()
                ]);
            } else {
                // 如果没有记录，填加记录
                DB::table('footprint')->insertGetId([
                    'uid' => $uid,
                    'gid' => $gid,
                    'time' => time()
                ]);
            }
        }

        //
        return view('home.good.showGood', [
            'mpic' => $mpic,
            'good' => $good,
            'goodpics' => $goodpics,
            'comments' => $comments,
            'timeMess' => $timeMess,
            'iscollect' => $isCollect,
            'likes' => $likes
        ]);
    }
}
