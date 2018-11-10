<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cat;

class IndexController extends Controller
{

    // 前台显示表单
    public function index()
    {
        $model = new Cat;
        $data = $model->display_cat();
        // $arr = [];
        $one = [];
        $two = [];
        $three = [];

        foreach($data as $v){

            // 拆分成数组
            $arr = explode('-',$v->path);
            
            if(count($arr) == 2){
                $one[] = $v;
            }
            if(count($arr) == 3){
                $two[] = $v;
            }
            if(count($arr) == 4){
                $three[] = $v;
            }

        }

        // dd($one,$two,$three);

        return view('home.index.index',[
            'one' => $one,
            'two' => $two,
            'three' => $three,
        ]);
    }


    // 操作
    public function cat()
    {
       
    }





}
