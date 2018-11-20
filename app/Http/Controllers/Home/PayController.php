<?php

namespace App\Http\Controllers\home;
session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PayController extends Controller
{
    // ********支付结算---显示
    public function pay_show()
    {
        $id = session('id');
        $stmt = DB::table('user_address')
                            ->where('user_id','=',$id)
                            ->select('*')->get();
        
        $data = DB::table('goods_cart')
                ->select('goods_name','sku_price','goods_count','goods_img')
                ->where('checked','=','true')
                ->get();
        $price= 0;  
        foreach($data as $v)
        {
            $price += $v->sku_price*$v->goods_count;   
        }
        return view('home.car.getOrderInfo',['data'=>$data,'price'=>$price,'stmt'=>$stmt]);
    }

    // **********提交订单---显示
    public function submit()
    {
        return view('home.car.pay');
    }
}
