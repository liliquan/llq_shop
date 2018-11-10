<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    // 通过table在模型上定义属性来指定自定义的表
    protected $table = 'goods';
    protected $fillable = ['goods_name','desc','brand_name','sku_name','sku_value','stock','price','attr_name','attr_value','many_logo','country','desc','colId_1','colId_2','colId_3','editorValue'];
    // 如果希望添加时间
    public $timestamps = true;

    // **********根据父类ID取出所有的分类
    public function getCat($parent_id = 0)
    {
        return DB::table('goods_class')
                    ->where("parent_id",$parent_id)
                    ->get();
    }

    // ************取出所有的品牌
    public function brand()
    {
        return DB::table('brand')
                ->get();
    }


    // *************添加商品
    public function insert_goods($all_logo)
    {
        
        $id = DB::table('goods')->insertGetId([
                            'goods_name'=>$_POST['goods_name'],
                            'goods_price'=>$_POST['goods_price'],
                            'brand_id'=>$_POST['brand_name'],
                            'colId_1'=>$_POST['colId_1'],
                            'colId_2'=>$_POST['colId_2'],
                            'colId_3'=>$_POST['colId_3'],
                            'lg_logo'=>$all_logo['bg_logo'],
                            'md_logo'=>$all_logo['md_logo'],
                            'sm_logo'=>$all_logo['sm_logo'],
                            'logo'=>$all_logo['logo'],
                            'desc'=>$_POST['editorValue'],
                            ]);
        return $id;
    }


    // 查询所有的产品并显示
    public function view_goods()
    {
        return DB::table('goods as a')
                ->join('goods_sku as b','a.id','=','b.good_id')
                ->join('sku_attr as c','b.id','=','c.sku_id')
                ->select("a.id","a.goods_name","a.created_at","a.logo",'c.sku_name','c.sku_value','b.stock','b.price')
                ->groupby('a.id')
                ->paginate(2);
    }



}
