<?php

namespace App\Http\Controllers\Admin;

use DB;
use  App\Models\Power;
use  App\Models\Admin;
use Hash;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    // 权限管理
    public function admin_manage()
    {
        $data = DB::table('power')->select('power.*','admin.admin_name')
                    ->leftJoin('admin_power','power.id','=','admin_power.power_id')
                    ->leftJoin('admin','admin_power.admin_id','=','admin.id')
                    ->get(); 
                   
        
       return view('admin.admin.admin_Competence',['data'=>$data]);
    }

    // 管理员列表
    public function admin_list()
    {
        $stmt =Power::get();
        // $data =Admin::paginate(1);
        $data = DB::table('admin')->select('admin.*','power.power_name')
                    ->leftJoin('admin_power','admin.id','=','admin_power.admin_id')
                    ->leftJoin('power','admin_power.power_id','=','power.id')
                    ->paginate(10);
       return view('admin.admin.administrator',['data'=>$data,'stmt'=>$stmt]);
    }

    // 添加管理员
    public function add_adminer(Request $req)
    {
        
        $adminer = new Admin;
        // $adminer->user_name = $req->admin_name;
        // $adminer->userpassword = $req->password;
        // dd(Hash::make($req->password));
        $id = DB::table('admin')->insertGetId(
            ['admin_name' => $req->admin_name, 'role' => $req->role,'password'=>Hash::make($req->password)]
        );

        DB::table('admin_power')->insert([
            'admin_id'=>$id,'power_id'=>$req->role
        ]);
        return redirect('/admin/admin_list');
    }

    // 个人信息
    public function admin_info()
    {
       return view('admin.admin.admin_info');
    }


    // 添加权限---->显示视图
    public function add_admin()
    {
        return view('admin.admin.Competence');
    }

    // 添加权限
    public function add_power(Request $req)
    {
        $power = new Power;
        $power->power_name = $req->power_name;
        $power->power_desc = $req->power_desc;
        $power->save();
        return redirect('/admin/admin_manage');
    }

    // 删除管理员
    public function delete_adminer($id)
    {
        $model = new Admin;
        DB::table('admin')->delete($id);
        return redirect('/admin/admin_list');
    }

}
