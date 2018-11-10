<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class SeckillController extends Controller
{

    // 秒杀页面显示
    public function seckill()
    {
        return view('home.seckill_item.seckill-index');
    }


    // 秒杀详情
    public function seckill_item()
    {
        return view('home.seckill_item.seckill-item');
    }
}
