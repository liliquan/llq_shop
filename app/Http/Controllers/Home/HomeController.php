<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use DB;

class HomeController extends Controller
{
    // 我的订单
    public function home()
    {
        return view('home.home.home-orderDetail');
    }

    // 待付款
    public function wait_pay()
    {
        return view('home.home.home-order-pay');
    }

    // 待发货
    public function wait_send()
    {
        return view('home.home.home-order-send');
    }

    // 待收货
    public function wait_receive()
    {
        return view('home.home.home-order-receive');
    }

    // 待评价
    public function wait_evaluate()
    {
        return view('home.home.home-order-evaluate');
    }

    // 我的收藏
    public function collect()
    {
        return view('home.home.home-person-collect');
    }


    // 我的足迹
    public function footmark()
    {
        return view('home.home.home-person-footmark');
    }

    // 地址管理
    public function info()
    {
        return view('home.home.home-setting-info');
    }

    // 地址管理
    public function address()
    {
        $id = session('id');
        $data = DB::table('user_address')
                            ->where('user_id','=',$id)
                            ->select('*')->get();
        // dd($data);
        return view('home.home.home-setting-address',['data'=>$data]);
    }

    // 添加新地址
    public function add_address(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'address'=>'required|min:10',
            'phone'=>'required|min:11|max:11',
        ],[
            'name.required'=>'收货人不能为空',
            'address.required'=>'地址不能为空',
            'address.min'=>'请输入正确的地址',
            'phone.required'=>'收货人电话不能为空',
            'phone.min'=>'请输入正确的手机号',
            'phone.max'=>'请输入正确的手机号',
        ]);

        $stmt = DB::table('user_address')->insert([
            'name'=>$_POST['name'],
            'address'=>$_POST['address'],
            'phone'=>$_POST['phone'],
            'user_id'=>session('id')
        ]);
        return back();
         
    }

    // 待评价
    public function safe()
    {
        return view('home.home.home-setting-safe');
    }
}
