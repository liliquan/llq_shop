<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'goods_order';
    protected $fillable = ['order','user_id','address','phone','goods_id','total','state','mock_order'];
    
    public function create($money)
    {
        $flake = new \libs\Snowflake;
        $stmt = DB::table('goods_order')
                    ->insert([
                        'order','user_id','address','phone','goods_id','total','state','mock_order'
                    ]);
    }

    public function findBySn($get_order)
    {
        $stmt = DB::table('goods_order')->select('total')->where('order','=','$get_order')->get();
        return $stmt;
    }
}