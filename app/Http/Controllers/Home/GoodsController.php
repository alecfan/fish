<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Org\Chinese;
use Illuminate\Support\Facades\Redis;

class GoodsController extends Controller
{

    /**
     * 显示用户发布商品界面
     */
    public function create()
    {
        return view('home.goods.add');
    }

    /**
     * 商品发布操作
     */
    public function store(Request $request)
    {
        // 获取商品信息
        $arr = $request->except('_token', 'first', 'second', 'main', 'minor');
        $arr['addtime'] = time();
        $arr['uid'] = session('userid');
        $arr['status'] = 0;
        $arr['is_auction'] = 0;

        // 主图上传
        if ($request->file('main')->isValid()) {
            // 生成上传文件对象
            $main = $request->file('main');
        }
        $ext = $main->getClientOriginalExtension();
        // 生成一个新文件名
        $mainname = time() . rand(1000, 9999) . '.' . $ext;
        // 移动文件
        $main->move('./home/images', $mainname);
        // 判断上传是否成功
        if ($main->getError() > 0) {
            return redirect('/')->with('update', '发布失败');
        } else {
            // 商品信息入库，并获得该商品ID
            $gid = DB::table('goods')->insertGetId($arr);

            // ===============添加到redis===================
            // 生成一个id。正常情况下不先存数据库，那么没有自增的id
            // $id = Redis::incr('id-goods'); // 因为redis没有自增id，要设计一个id
            Redis::hmset('goods:' . $gid, $arr); // 存储数据到redis（少商品id）
            Redis::lpush('ids:user-' . session('userid') . '-goods', $gid); // 用户发布的商品id
            Redis::lpush('ids:goods', $gid); // 商品id

            // 商品标题分词并插入分词库
            $fenci = Chinese::fenci($arr['title']);
            foreach ($fenci as $ci) {
                $id = DB::table('fenci')->insertGetId([
                    'gid' => $gid,
                    'title' => $ci['word']
                ]);

                Redis::hmset('fenci:' . $gid . '-' . $id, [
                    'gid' => $gid,
                    'title' => $ci['word']
                ]);
                Redis::lpush('ids:fenci-' . $gid, $id);
            }

            // 获取主图入库的数据
            $mainarr['gid'] = $gid;
            $mainarr['picname'] = $mainname;
            $mainarr['mpic'] = 1;
            $id = DB::table('goodspics')->insertGetId($mainarr);
            Redis::hmset('goodspics:' . $gid . '-' . $id, $mainarr);
            Redis::lpush('ids:goodspics-' . $gid, $id);

            // 获取多图
            $count = $request->file('minor');
            // 判断是否上传多图
            if ($count[0]) {
                foreach ($count as $minor) {
                    $extt = $minor->getClientOriginalExtension();
                    $minorname = time() . rand(1000, 9999) . '.' . $extt;
                    // 移动文件
                    $minor->move('./home/images', $minorname);
                    if ($minor->getError() > 0) {
                        return redirect('/')->with('update', '发布失败');
                    } else {
                        // 获取多图入库的数据
                        $minorarr['gid'] = $gid;
                        $minorarr['picname'] = $minorname;
                        $id = DB::table('goodspics')->insertGetId($minorarr);
                        Redis::hmset('goodspics:' . $gid . '-' . $id, $minorarr);
                        Redis::lpush('ids:goodspics-' . $gid, $id);
                    }
                }
            }
            return redirect('/person/selling')->with('update', '发布成功');
        }
    }

    /**
     * 查询分类Ajax
     */
    public function show(Request $request)
    {
        $pid = $request->input('pid');
        $list = DB::table('type')->where('pid', $pid)->get();
        echo json_encode($list);
    }

    /**
     * 显示商品修改界面
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $goods = DB::table('goods')->where('id', $id)->first();
        // dd($goods);
        return view('home.goods.edit', [
            'goods' => $goods
        ]);
    }

    /**
     * 商品修改更新入库
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // 获取商品信息先存到商品表
        $arr = $request->except('_token', '_method', 'main', 'minor');
        $arr['addtime'] = time();

        // 商品信息入库，并获得该商品ID
        $list = DB::table('goods')->where('id', $id)->update($arr);

        // 判断主图，修改图片名，存入数据库
        if ($request->hasfile('main')) {
            if ($request->file('main')->isValid()) {
                // 生成上传文件对象
                $main = $request->file('main');
            }
            $ext = $main->getClientOriginalExtension();
            // 生成一个新文件名
            $mainname = time() . rand(1000, 9999) . '.' . $ext;
            // 移动文件
            if ($main->move('./home/images', $mainname)) {
                // 1.删除原图片记录
                DB::table('goodspics')->where('gid', $id)
                    ->where('mpic', 1)
                    ->delete();
                // 2.添加新图片记录到数据库
                $mainarr['gid'] = $id;
                $mainarr['picname'] = $mainname;
                $mainarr['mpic'] = 1;
                DB::table('goodspics')->where('gid', $id)
                    ->where('mpic', 1)
                    ->insert($mainarr);

                // 3.删除原图片
            }
        }

        // 判断详图，改名，入库
        // dd($request);
        if ($request->hasFile('minor')) {
            // 获取多图
            $count = $request->file('minor');
            // 1.删除原图片记录
            $main = DB::table('goodspics')->where('gid', $id)
                ->where('mpic', 0)
                ->delete();

            // 2.循环遍历插入图片
            foreach ($count as $minor) {
                $extt = $minor->getClientOriginalExtension(); // 原文件后缀
                $minorname = time() . rand(1000, 9999) . '.' . $extt; // 新文件名

                if ($minor->move('./home/images', $minorname)) {
                    // 2.添加新图片记录到数据库
                    // 获取新图片名
                    $minorarr['picname'] = $minorname;
                    $minorarr['gid'] = $id;
                    $minorarr['mpic'] = 0;

                    $main = DB::table('goodspics')->where('gid', $id)
                        ->where('mpic', 0)
                        ->insert($minorarr);
                }
            }
        }

        if ($list > 0) {
            return redirect('/deal')->with('msg', '修改成功');
        } else {
            return redirect('/deal')->with('error', '修改失败');
        }
    }

    /**
     * 商品删除
     *
     * @param int $id
     *            商品id
     */
    public function destroy($id)
    {
        // 删除商品
        $res = DB::table('goods')->where('id', $id)->delete();
        $redis = new \Redis();
        $redis->connect('192.168.184.222', 6379);
        $redis->auth('123456');
        $redis->select(1);
        $redis->lrem('ids:goods', "$id", 0);

        Redis::del('goods:' . $id);

        if ($res > 0) {
            // 删除商品图片
            $res = DB::table('goodspics')->where('gid', $id)
                ->select('picname')
                ->get();
            foreach ($res as $v) {
                @unlink('home/images/' . $v->picname);
            }
            // 删除商品图片表
            DB::table('goodspics')->where('gid', $id)->delete();
            $arr = Redis::lrange('ids:goodspics-' . $id, 0, - 1);
            foreach ($arr as $v) {
                Redis::del('goodspics:' . $id . '-' . $v);
            }
            Redis::del('ids:goodspics-' . $id);

            // 删除分词表
            DB::table('fenci')->where('gid', $id)->delete();
            $arr = Redis::lrange('ids:fenci-' . $id, 0, - 1);
            foreach ($arr as $v) {
                Redis::del('fenci:' . $id . '-' . $v);
            }
            Redis::del('ids:fenci-' . $id);

            return redirect('/person/selling')->with('msg', '删除成功');
        } else {
            return redirect('/person/selling')->with('error', '删除失败');
        }
    }
}
