<?php
/**************************************
 * FileName : PersonController.php
 * Author : Zhuyunfei
 * Date : 2017-07-30
 * Description : 个人中心模块控制器
 **************************************/
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{

    /**
     * 显示用户个人中心页面
     */
    public function showIndex()
    {

        // 获取登陆的用户信息
        $list = DB::table('users')->where('id', session('userid'))->get();
        // 获取登录用户的收藏信息
        $collects = DB::table('goodscollect')->leftjoin('goods', 'goodscollect.gid', '=', 'goods.id')
            ->leftjoin('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->select('goods.id as goodid', 'goods.title', 'goods.price', 'goodspics.picname', 'goods.locate')
            ->where('goodspics.mpic', 1)
            ->where('goodscollect.uid', session('userid'))
            ->get();

        return view('home.person.showIndex', [
            'list' => $list,
            'collects' => $collects
        ]);
    }

    /**
     * 显示个人资料修改页面
     */
    public function editInfo()
    {
        // TODO id需改
        $list = DB::table('users')->where('id', session('userid'))->get();
        return view('home.person.editInfo', [
            'list' => $list
        ]);
    }

    /**
     * 提交个人信息的修改
     *
     * @param request $request
     *            修改的内容
     * @return \Illuminate\Http\RedirectResponse
     */
    public function UpdateInfo(request $request)
    {
        $messages = array(

            'username.unique' => '用户已存在',
            'username.required' => '用户名必须填写'
        );
        // 表单自动验证
        $this->validate($request, [
            'username' => 'unique:users',
            'username' => 'required:username'
        ], $messages);
        // dd($request);
        // $old = $request->input('image');
        // dd($old);
        $arr = $request->except('_token', 'image');
        // dd($arr);
        if ($request->hasFile('photo')) {
            // 判断文件是否有效
            if ($request->file('photo')->isValid()) {
                // 生成上传文件对象
                $file = $request->file('photo');
            }
            // 获取源文件的后缀
            $ext = $file->getClientOriginalExtension();

            // 生成一个新文件名
            $picname = time() . rand(1000, 9999) . '.' . $ext;
            // dd($picname);
            // 移动文件
            $file->move('./home/upload', $picname);
            $arr['photo'] = $picname;
            // dd($arr);
            // dd($file->getError());

            if ($file->getError() > 0) {

                echo '上传失败';
            } else {

                echo '上传成功';
            }
        }

        if (array_key_exists('birthday', $arr)) {
            echo $arr['birthday'] = strtotime($arr['birthday']);
        }

        $res = DB::table('users')->where('id', session('userid'))->update($arr);
        // unlink('./home/upload/' . $old);

        if ($res > 0) {
            return redirect('/person/info')->with('msg', '修改成功');
        } else {
            return redirect('/person/info')->with('error', '修改失败');
        }
    }

    /**
     * 显示用户浏览足迹
     */
    public function foot()
    {
        // 用户id
        $uid = session()->get('userid');

        // 查出所有浏览记录
        $arr = DB::table('footprint')->where('uid', $uid)
            ->select('gid', 'time')
            ->get();

        foreach ($arr as $v) {
            $today = date('Y-m-d');
            $st = strtotime($today); // 今天零点
            $ed = $st + (60 * 60 * 24); // 今天24点
            $lastweek = $st - 60 * 60 * 24 * 7; // 一周之前

            if ($v->time > $st && $v->time < $ed) {
                $todayGids[] = $v->gid; // 今天浏览的商品id
            }

            if ($v->time < $st && $v->time > $lastweek) {
                $lastweekGids[] = $v->gid; // 一周内浏览的商品id
            }
        }

        $goods = []; // 分配给前台的商品

        // 今天浏览的商品
        if (! empty($todayGids)) {
            $todayGoods = DB::table('goods')->join('users', 'goods.uid', '=', 'users.id')
                ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
                ->select('goods.id', 'goods.title', 'goods.price', 'users.username', 'users.photo', 'goodspics.picname')
                ->where('goodspics.mpic', 1)
                ->whereIn('goods.id', $todayGids)
                ->get();

            $goods['todayGoods'] = $todayGoods;
        }

        // 最后一周浏览的商品
        if (! empty($lastweekGids)) {
            $lastweekGoods = DB::table('goods')->join('users', 'goods.uid', '=', 'users.id')
                ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
                ->select('goods.id', 'goods.title', 'goods.price', 'users.username', 'users.photo', 'goodspics.picname')
                ->where('goodspics.mpic', 1)
                ->whereIn('goods.id', $lastweekGids)
                ->get();

            $goods['lastweekGoods'] = $lastweekGoods;
        }

        return view('home.person.foot', [
            'goods' => $goods
        ]);
    }

    /**
     * 显示我发布的商品
     */
    public function showSelling()
    {
        // 用户id
        $uid = session()->get('userid');

        $redis = new \Redis();
        $redis->connect('192.168.184.222', 6379);
        $redis->auth('123456');
        $redis->select(1);
        $arr = $redis->lrange('ids:user-' . $uid . '-goods', 0, - 1);
        if (! empty($arr)) {
            foreach ($arr as $v) {
                $good = $redis->hGetAll('goods:' . $v);
                $good['id'] = $v;
                if ($good['status'] == 0 && $good['is_auction'] == 0) {
                    $arr_ids_goodspics = $redis->lrange('ids:goodspics-' . $v, 0, - 1);

                    foreach ($arr_ids_goodspics as $ids_goodspics) {
                        $goodspics = $redis->hGetAll('goodspics:' . $v . '-' . $ids_goodspics);
                        if (isset($goodspics['mpic'])) {
                            $good['picname'] = $goodspics['picname'];
                        }
                    }

                    $list[] = $good;
                }
            }
        } else {
            $res = DB::table('goods')->where('goods.uid', '=', $uid)
                ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
                ->where('goodspics.mpic', '=', '1')
                ->where('goods.status', 0)
                ->where('goods.is_auction', 0)
                ->select('goods.*', 'goodspics.picname', 'goodspics.mpic')
                ->get(); // 0为正常上架状态

            $list = [];
            foreach ($res as $value) {
                $list[]['title'] = $value->title;
                $list[]['description'] = $value->description;
                $list[]['price'] = $value->price;
                $list[]['addtime'] = $value->addtime;
                $list[]['status'] = $value->status;
            }
        }

        // 加载模板
        return view('home.person.selling', [
            'list' => $list
        ]);
    }

    /**
     * 显示我卖出的商品
     */
    public function showSold()
    {
        $list = DB::table('goods')->where('goods.uid', '=', '2')
            ->where('goods.status', '=', '3')
            ->join('goodspics', 'goods.id', '=', 'goodspics.gid')
            ->select('goods.*', 'goodspics.picname', 'goodspics.mpic')
            ->where('goodspics.mpic', '=', '1')
            ->paginate(2);

        // paginate(3);

        return view('home.deal.sell', [
            'list' => $list
        ]);
    }

    /**
     * 显示我买到的商品
     */
    public function showBought()
    {
        //
        $list = DB::table('orders')->where('buyer', '=', '2')
            ->join('goods', 'goods.id', '=', 'orders.gid')
            ->join('goodspics', 'goodspics.gid', '=', 'goods.id')
            ->where('goodspics.mpic', '=', 1)
            ->select('orders.*', 'goodspics.picname', 'goodspics.mpic', 'goods.title')
            ->paginate(2);
        // dd($list);
        return view('home.deal.buy', [
            'list' => $list
        ]);
    }
}