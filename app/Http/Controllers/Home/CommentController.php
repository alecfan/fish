<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

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
