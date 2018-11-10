<?php

namespace App\Http\Controllers\home;
session_start();
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use DB;

class CartController extends Controller
{
    public function cart_show()
    {
        $data = DB::table('goods_cart')->select(
            'id','goods_count','goods_name','goods_img','sku_price','sku'
        )->get();
        $count = 0;

        // dd($data);
        foreach($data as $v)
        {
            $count+=  $v->goods_count;
        }
        // dd($count);
        return view('home.car.cart',['data'=>$data,'count'=>$count]);
    }

    public function add_car(Request $req)
    {
        $id = $_GET['id'];
        $model = new Cart;
        $data = $model->name($id);
        $img = $data['image'][0]->path;

        $value = session('id');

        $str = '';
        foreach($req->sku_name as $k=>$v)
        {
            $str .= $v.":".$req->sku_value[$k].';';
        }
        
        $sku =  DB::table('goods_cart')
                        ->select('sku','goods_id')
                        ->where('user_id','=',$value)
                        ->get();
        // dd($sku);
        if(count($sku)==0)
        {
            $cart = DB::table('goods_cart')->insert([
                'goods_id'=>$id,
                'goods_name'=>$req->goods_name,
                'goods_count'=>$req->shuliang,
                'goods_img'=>$img,
                'sku_price'=>$req->price,
                'sku'=>$str,
                'user_id'=>$value,  
            ]);
        }
        else
        {
            foreach($sku as $v)
            {
                $a = $v->sku;
                $b = $v->goods_id;   
            }
            if($str == $a && $id == $b)
            {
                DB::table('goods_cart')->increment('goods_count',$req->shuliang);
            }
            else
            {
                $cart = DB::table('goods_cart')->insert([
                    'goods_id'=>$id,
                    'goods_name'=>$req->goods_name,
                    'goods_count'=>$req->shuliang,
                    'goods_img'=>$img,
                    'sku_price'=>$req->price,
                    'sku'=>$str,
                    'user_id'=>$value,  
                ]);
            }
        }
        return redirect()->route('cart');
    }


    // 商品详情页
    public function item($id)
    {
        $model = new Cart;
        $data = $model->name($id);
        // dd($data);
        return view('home.car.item',[
            'goods'=>$data['goods'],
            'image'=>$data['image'],
            'image_one'=>$data['image_one'],
            'attr'=>$data['attr'],
            'sku'=>$data['sku'],
        ]);
    }

    // 删除商品
    public function delCart()
    {
        $id = $_GET['id'];
        return DB::table('goods_cart')->where('id','=',$id)->delete();
    }

    // 购物车商品数量添加
    public function updateCount()
    {
        $id = $_GET['id'];
        $count = $_GET['count'];
        DB::table('goods_cart')->where('id','=',$id)->update(['goods_count'=>$count]);
    }

    public function carts(){

        echo DB::table('goods_cart')->where('user_id',session('id'))->get();
    }

    public function updateCheck(){
        $id = $_GET['id'];
        $check = $_GET['check'];
        DB::table('goods_cart')->where('id',$id)->update([
            'checked'=>$check
        ]);
    }


}
