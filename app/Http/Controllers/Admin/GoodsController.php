<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


class GoodsController extends Controller
{
    // 产品类表
    public function product_list()
    {
        $model = new Goods;
        $data = $model->view_goods();
        // dd($data);
        return view('admin.goods.products_list',['data'=>$data]);
    }

    // 添加商品-------------->显示表单
    public function add_goods()
    {
        $model = new Goods;
        $data = $model->getCat();

        $brand = $model->brand();
        // dd($data);
        return view('admin.goods.picture-add',[
            'data'=>$data,
            'brand'=>$brand,
        ]);
    }

    // *************三级联动---->显示***********
    public function ajax_get_cat()
    {
        $id = $_GET['id'];
        // 根据这个ID查询子分类
        $model = new Goods;
        $data = $model->getCat($id);
        echo json_encode($data);
    }

    public function _before_insert(){
        $logo = $_FILES['logo'];
        $date = date("Ymd");
        $logo_file = ROOT.'/public/uploads/logo/'.$date;
        // dd($logo);
        // dd($logo_file);
        if(!is_dir($logo_file))
        {
            mkdir($logo_file,0777,true);
        }
        
        $logo_data = explode('/',$logo['type']);
        $logo_ext = $logo_data[1];
        $logo_rand = rand(100,10000);
        $logo_name = time().$logo_rand.'.'.$logo_ext;
      
        move_uploaded_file($logo['tmp_name'],$logo_file.'/'.$logo_name);
        

        $bgLogo = Image::make($logo_file.'/'.$logo_name);
        
        $bgLogo->crop((int)$_POST['w'], (int)$_POST['h'], (int)$_POST['x'], (int)$_POST['y']);
        $bgLogo->save(ROOT.'/public/uploads/logo/'.$date.'/bg_'.$logo_name);
        $bg_logo = '/uploads/logo/'.$date.'/bg_'.$logo_name;
        
        $mdLogo = Image::make($logo_file.'/'.$logo_name);
        $mdLogo->resize(400,400);
        $mdLogo->save(ROOT.'/public/uploads/logo/'.$date.'/md_'.$logo_name);
        $md_logo = '/uploads/logo/'.$date.'/md_'.$logo_name;

        $smLogo = Image::make($logo_file.'/'.$logo_name);
        $smLogo->resize(50,50);
        $smLogo->save(ROOT.'/public/uploads/logo/'.$date.'/sm_'.$logo_name);
        $sm_logo = '/uploads/logo/'.$date.'/sm_'.$logo_name;
        $logo1 = '/uploads/logo/'.$date.'/'.$logo_name;
        // dd($logo1);
        $all_logo = ['logo'=>$logo1,'bg_logo'=>$bg_logo,'md_logo'=>$md_logo,'sm_logo'=>$sm_logo];

        return $all_logo;
    }

    // 添加商品-------------->处理表单
    public function insert_goods(Request $req)
    {
        
        // dd($_FILES['logo']['tmp_name']);
        // 三级联动。缩略图上传保存。多文件上传。添加多个属性和SKU。品牌。
        // dd($_POST,$_FILES);
        // *****************************缩略图上传************
        // dd($_POST['brand_name']);
        // dd($_POST);

        $all_logo = $this->_before_insert();
        // dd($req->sku_name);
        // dd($all_logo);
        // dd($bgLogo);
        $model = new Goods;
        
        $id = $model->insert_goods($all_logo);
         // **************************添加SKU********************
        foreach($_POST['sku_name'] as $k => $v)
        {
            DB::table('goods_sku')->insert(['stock'=>$_POST['stock'][$k],'price'=>$_POST['price'][$k],'good_id'=>$id]);
        }
        // ***************************添加SKU到SKU属性表中******************
        foreach($_POST['sku_name'] as $k => $v)
        {
            $id1 = DB::getPdo()->lastInsertId();
            DB::table('sku_attr')->insert([ 'sku_id'=>$id1, 'sku_name'=>$_POST['sku_name'][$k], 'sku_value'=>$_POST['sku_value'][$k] ]);
        }
 
         // ****************************添加属性*********************    
         foreach($_POST['attr_name'] as $k => $v)
         {
             DB::table('goods_attribute')->insert(['attr_name'=>$v,'attr_value'=>$_POST['attr_value'][$k],'good_id'=>$id]);
         }

         // ****************************添加品牌*********************   
        DB::table('goods_brand')->insert(['brand_id'=>$_POST['brand_name'],'goods_id'=>$id]);
        

        // *************************************多图片上传************** 
        $img = [];
        $many_logo = $_FILES['many_logo'];
        foreach ($many_logo['name'] as $k => $v) 
        {
            $img['name'] = $v;
            $img['type'] = $many_logo['type'][$k];
            $img['tmp_name'] = $many_logo['tmp_name'][$k];
            $img['error'] = $many_logo['error'][$k];
            $img['size'] = $many_logo['size'][$k];

            $_FILES['img'] = $img;
            // dd($img);
            $date = date('Ymd');
            $file = ROOT.'/public/uploads/many_logo/'.$date;
            if(!is_dir($file)){
                mkdir($file,0777,true);
            }

            $data = explode('/',$_FILES['img']['type']);
            $ext = $data[1];
            $rand = rand(100,10000);
            
            $name = time().$rand.'.'.$ext;
            // dd($_FILES);
            move_uploaded_file($_FILES['img']['tmp_name'],$file.'/'.$name);
            
            $image = '/uploads/many_logo/'.$date.'/'.$name;

            DB::table('goods_image')->insert([
                                        'goods_id'=>$id,
                                        'path'=>$image,
            ]); 
        } 

        return redirect('/admin/product_list');
    }
    



    // 品牌管理
    public function brand()
    {
        // $data =Brand::get()->paginate(1);
        $data =DB::table('brand')->select()->paginate(2);
        // dd($data);
        return view('admin.goods.brand_manage',['data'=>$data]);
    }

    // 添加品牌 加载视图
    public function add_brand()
    {
        
        return view('admin.goods.Add_Brand');
    }

    // 添加品牌  添加处理表单 
    public function add_handle(Request $req)
    {
        // dd($_POST);
        // dd($_FILES);
        // dd($req);
        $brand = new Brand;
        $date = date('Ymd');

        $path = $req->file('logo')->store('brand_logo'.'/'.$date);
        // dd($path);
        $address = '/uploads/'.$path;

        $brands = DB::table('brand')->insert(
            ['brand_name'=>$_POST['brand_name'],'logo'=>$address,'country'=>$_POST['country'],'desc'=>$_POST['desc']]
        );
        return redirect('/admin/brand');
        // return view('admin.goods.brand_manage');
    }


    // 分类管理
    public function product_type()
    {
        $model = new Category;
        $data = $model->getCat();
        // dd($data);   
        return view('admin.goods.product-category-add',['data'=>$data]);
    }

    // 添加分类
    public function add_type()
    {
        $model = new Category;
        $model->add();
        return redirect('/admin/product_type');        
    }
    
    // 删除分类
    public function delete_type($id)
    {
        $model = new Category;
        DB::table('goods_class')->delete($id);
        return redirect('/admin/product_type');        
    }

}