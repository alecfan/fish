<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('comment')->join('goods', 'comment.gid', '=', 'goods.id')
            ->join('users', 'comment.uid', '=', 'users.id')
            ->select('comment.*', 'goods.title', 'users.username');

        $list = $list->paginate(6);
        $now = $list->currentPage();
        // dd($list);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.comment.index', [
            'list' => $list,
            'now' => $now
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
        // dd($request);
        $list = DB::table('comment')->where('comment.gid', '=', "$id")
            ->join('goods', 'comment.gid', '=', 'goods.id')
            ->join('users', 'comment.uid', '=', 'users.id')
            ->select('comment.*', 'goods.title', 'users.username');

        // dd($list);
        // 执行分页查询
        $list = $list->paginate(6);
        $now = $list->currentPage();
        // dd($list);
        // 加载模板的同时，把查询的数据，以及分页时需要携带的参数传到模板上
        return view('admin.comment.index', [
            'list' => $list,
            'now' => $now
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
        $res = DB::table('comment')->where('id', $id)->delete();
        // dd($res);
        if ($res > 0) {
            return redirect('/admin/comment')->with('msg', '删除成功');
        } else {
            return redirect('/admin/comment')->with('error', '删除失败');
        }
    }
}
