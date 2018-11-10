<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    // 店铺列表
    public function shop_list()
    {
        return view('admin.shop.shop_list');
    }
    // 店铺审核
    public function shop_audit()
    {
        return view('admin.shop.shops_audit');
    } 
}
