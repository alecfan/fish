<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showGood($id)
    {
        //
        $good = DB::table('goods')->where('id', $id)->first();
        // dd($good);
        return view('home.good.showGood', [
            'good' => $good
        ]);
    }
}
