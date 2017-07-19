<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
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
        //
        return view('home.person.showIndex');
    }

    /**
     * 显示个人资料修改页面
     */
    public function editInfo()
    {
        return view('home.person.editInfo');
    }
}
