<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    // 账户管理
    public function pay_account()
    {
        return view('admin.pay.cover_management');
    }

    // 支付方式
    public function pay_method()
    {
        return view('admin.pay.payment_method');
    }


    // 账户管理
    public function pay_config()
    {
        return view('admin.pay.payment_configure');
    }

    
}
