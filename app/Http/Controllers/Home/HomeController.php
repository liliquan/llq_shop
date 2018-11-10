<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('home.home.home-setting-address');
    }

    // 待评价
    public function safe()
    {
        return view('home.home.home-setting-safe');
    }
}
