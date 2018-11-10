<?php

namespace App\Http\Controllers\Admin;
use  App\Models\Admin;
use Hash;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

   
    // 登录
    public function login()
    {
        $data =Admin::where('admin_name',$_POST['username'])->first();
        // var_dump($data['admin_name']);   
        // dd($_POST);
        // dd($_POST['password'],$data->password);
        // dd(Hash::check($_POST['password'],$data->password));
        if($data){
            if(Hash::check($_POST['password'],$data->password))   
            {
                session([
                    'id'=>$data->id,
                ]);
                return redirect('/admin/index')->with('status','登录成功！');
    
            }else{
                return back()->with('status','密码不正确！');
            }
        }else{
            return back()->with('status','用户名不存在！');
        }
        
    }

    // 退出
    public function logout(Request $req)
    {
        $req->session()->flush();
        return redirect()->route('login_view');
        // return view('admin.login');
    }
    
    
    // 显示登陆
    public function login_view()
    {
        return view('admin.login'); 
    }
}
