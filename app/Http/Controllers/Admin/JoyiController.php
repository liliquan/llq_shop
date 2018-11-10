<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoyiController extends Controller
{
    // 交易信息
    public function message()
    {
        return view('admin.joyi.transaction');
    }


    // 交易订单（图）
    public function joyi_order()
    {
        return view('admin.joyi.order_chart');
    }


    // 订单管理
    public function joyi_guanli()
    {
        return view('admin.joyi.orderform');
    }


    // 交易金额
    public function joyi_money()
    {
        return view('admin.joyi.amounts');
    }


    // 订单处理
    public function joyi_handle()
    {
        return view('admin.joyi.order_handling');
    }


    // 退款管理
    public function joyi_refund()
    {
        return view('admin.joyi.refund');
    }

}


