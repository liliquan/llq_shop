<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cat extends Model
{
    // 商品分类表
    protected $table = 'goods_class';


    // 数据库查找分类显示
    public function display_cat()
    {
        return DB::table('goods_class')->get();
        // $data = DB::table('goods_class')->select('*',DB::raw("CONCAT(path,id,'-')"))
        //                 ->orderBy(DB::raw("CONCAT(path,id,'-')"),'asc')->get();
        return $data;
    }

}
