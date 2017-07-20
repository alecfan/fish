<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AddressController extends Controller
{

    /**
     * 显示用户收货地址
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('usersadds')->where('uid', 2)->get();
        return view('home.address.showAddress', [
            'list' => $list
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
     * 添加用户收货地址
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $province = $request->input('province');
        $city = $request->input('city');
        $county = $request->input('county');
        $province = DB::table('district')->select('name')
            ->where('id', $province)
            ->first();
        $city = DB::table('district')->select('name')
            ->where('id', $city)
            ->first();
        $county = DB::table('district')->select('name')
            ->where('id', $county)
            ->first();
        $arr = $request->except('_token');
        $arr['province'] = $province->name;
        $arr['city'] = $city->name;
        $arr['county'] = $county->name;
        $arr['uid'] = 2;
        $list = DB::table('usersadds')->insert($arr);
        if ($list) {
            return redirect('person/address')->with('add', '添加成功');
        }
    }

    /**
     * 查询全国城市三级联动
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $upid = $request->input('upid');
        $list = DB::table('district')->where('upid', $upid)->get();
        echo json_encode($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = DB::table('usersadds')->where('id', $id)->first();
        return view('home.address.editAddress', [
            'list' => $list
        ]);
    }

    /**
     * 修改用户收货地址
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $province = $request->input('province');
        $city = $request->input('city');
        $county = $request->input('county');
        $province = DB::table('district')->select('name')
            ->where('id', $province)
            ->first();
        $city = DB::table('district')->select('name')
            ->where('id', $city)
            ->first();
        $county = DB::table('district')->select('name')
            ->where('id', $county)
            ->first();
        $arr = $request->except('_token', '_method');
        $arr['province'] = $province->name;
        $arr['city'] = $city->name;
        $arr['county'] = $county->name;
        $list = DB::table('usersadds')->where('id', $id)->update($arr);
        if ($list) {
            return redirect('person/address')->with('update', '修改成功');
        }
    }

    /**
     * 删除用户收获地址
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = DB::table('usersadds')->where('id', $id)->delete();
        if ($list > 0) {
            return redirect('person/address')->with('del', '删除成功');
        } else {
            return redirect('person/address')->with('error', '删除失败');
        }
    }
}
