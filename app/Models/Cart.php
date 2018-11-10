<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Cart extends Model
{
    protected $table = 'goods';
    
    // 购物车
    public function name($id)
    {

        // $data['goods'] = goods::where('id',$id)->get();
        // $data['images'] = goods_image::where('goods_id',$id)->get();
        // $data['image_one'] = goods_image::where('goods_id',$id)->first();
        // $data['attr']=goods_attribute::where('goods_id',$id)->select('attt_name','attr_value')->first();

        $data['goods'] = DB::table('goods')->where('id',$id)->first();
        $data['image'] = DB::table('goods_image')->where('goods_id',$id)->get();
        $data['image_one'] = DB::table('goods_image as a')->join('goods as b','a.goods_id','=','b.id')->first();
        $data['attr'] = DB::table('goods_attribute as a')->join('goods as b','a.good_id','=','b.id')->select('attr_name','attr_value')->first();
        
        $sku = DB::table('goods_sku as a')->join('goods as b','a.good_id','=','b.id')
                                        ->join('sku_attr as c','a.id','=','c.sku_id')
                                        ->groupBy('c.sku_name')
                                        ->where('b.id',$id)
                                        ->select('c.sku_name',DB::raw('GROUP_CONCAT(c.sku_value SEPARATOR "&&") as sku_value'))
                                        ->get();
        // dd($sku);
        // $sku = Goods_sku::where('goods_id',$id)
        // ->groupBy('sku_name')
        // ->select('sku_name',DB::row('GROUP_CONCAT(sku_value SEPARATOR "&&") sku_value'))
        // ->get();
        // dd($sku);
        foreach($sku as $v)
        {
            $v->sku_value = explode("&&",$v->sku_value);
        }
        $data['sku'] = $sku;
        // dd($data);

        return $data; 
    }

}
