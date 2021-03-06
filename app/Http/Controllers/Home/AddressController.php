<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{

    /**
     * 显示用户收货地址
     */
    public function index()
    {
        $list = DB::table('usersadds')->where('uid', session('userid'))->get();
        return view('home.address.showAddress', [
            'list' => $list
        ]);
    }

    /**
     * 添加用户收货地址
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
        $arr['uid'] = session('userid');
        $list = DB::table('usersadds')->insert($arr);
        if ($list) {
            return redirect('person/address')->with('add', '添加成功');
        }
    }

    /**
     * 查询全国城市三级联动
     */
    public function show(Request $request)
    {
        $upid = $request->input('upid');
        $list = DB::table('district')->where('upid', $upid)->get();
        echo json_encode($list);
    }

    /**
     * 显示修改页面
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
