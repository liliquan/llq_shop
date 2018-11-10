<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    // ********支付结算---显示
    public function pay_show()
    {
        return view('home.car.getOrderInfo');
    }

    // **********提交订单---显示
    public function submit()
    {
        return view('home.car.pay');
    }
}
