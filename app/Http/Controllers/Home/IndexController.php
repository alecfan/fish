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
        $muyinGoods = getGoods(14, 4);

        // 查询数码类型商品
        $shumaGoods = getGoods(1, 4);

        // 查询

        // 分配所有变量到主页
        return view('home.index.index', [
            'data' => $type,
            'muyinGoods' => $muyinGoods,
            'shumaGoods' => $shumaGoods
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
