<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    // 设置这个模型对应的表
    protected $table = 'goods_class';
    // 设置允许接收的字段
    protected $fillable = ['class_name','parent_id','path'];
    
    public function getCat()
    {
        $data = DB::table('goods_class')->select('*',DB::raw("CONCAT(path,id,'-')"))
                        ->orderBy(DB::raw("CONCAT(path,id,'-')"),'asc')->get();
        return $data;
    }

    public function add()
    {
        $data = explode('|',$_POST['cat']);

        if(count($data) > 1){
            $parent_id = $data[0];
            $path = $data[1].$data[0].'-';
        }else {
            $parent_id = 0;
            $path = '-';
        }

        $data = DB::table('goods_class')->insert([
            'class_name'=>$_POST['class_name'],
            'parent_id'=>$parent_id,
            'path'=>$path
        ]);
    }
}
