<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{

    /**
     * 显示前台用户个人中心首页
     *
     * @return \Illuminate\Http\Response
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
        // dd($collects);
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
     * 用户浏览足迹
     */
    public function foot()
    {
        $uid = session()->get('userid'); // 用户id

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

        // dd($goods);
        /*
         * array:1 [▼
         * "todayGoods" => array:2 [▼
         * 0 => {#280 ▼
         * +"id": 80
         * +"title": "母婴222"
         * +"price": 3231.0
         * +"username": "admin"
         * +"photo": "user.jpg"
         * +"picname": "15008595134075.jpg"
         * }
         * 1 => {#281 ▼
         * +"id": 81
         * +"title": "奶嘴达瓦大家"
         * +"price": 4333.0
         * +"username": "admin"
         * +"photo": "user.jpg"
         * +"picname": "15008595754437.jpg"
         * }
         * ]
         * ]
         */
        return view('home.person.foot', [
            'goods' => $goods
        ]);
    }
}