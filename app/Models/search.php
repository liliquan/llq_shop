<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class search extends Model
{
    protected $table = 'goods';
    public function search($id)
    {
        // return DB::table('goods as a')
        //             ->join('goods_sku as b','a.id','=','b.good_id')
        //             ->join('sku_attr as c','b.id','=','c.sku_id')
        //             ->select('a.sm_logo','a.md_logo','a.goods_name','b.price','b.stock','c.sku_value')
        //             ->get();
        return DB::table('goods')->where('colid_3',$id)->paginate(10);

        // $sku = DB::table('goods_sku as a')
        //         ->join('sku_attr as b','a.id','=','b.sku_id')
        //         ->select('a.stock','a.price','b.sku_name','b.sku_value')
        //         ->first();

        // $img = DB::table('goods_image as a')
        //         ->join('goods as b','a.goods_id','=','b.id')
        //         ->select('a.path','b.logo','b.sm_logo','b.md_logo','b.md_logo')
        //         ->first();

        // return [$sku,$img];

    }
}
