<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    /**
     * 显示用户对商品的评论
     */
    public function index()
    {
        // 需要uid 从session中取
        $uid = session()->get('userid');

        $comments = DB::table('comment')->join('goods', 'goods.id', '=', 'comment.gid')
            ->where('comment.uid', $uid)
            ->get();

        $list['comments'] = $comments;
        return view('home.comment.index', $list);
    }

    /**
     * 存储用户给商品的评论
     */
    public function store(Request $request)
    {
        //
        $id = DB::table('comment')->insertGetId([
            'uid' => $request->input('uid'),
            'gid' => $request->input('gid'),
            'content' => $request->input('commentContent'),
            'addtime' => time()
        ]);

        if ($id > 0) {
            return back();
        }
    }
}
