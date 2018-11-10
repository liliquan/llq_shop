<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Hash;

class LoginController extends Controller
{
    public function home_login()
    {
        return view('home.user.login');
    }

    public function home_dolog(Request $req)
    {
        // $model = new User;
        // $data = $model->login();
        $data = User::where('username',$req->username)->first();
        if($data)
        {
            if(Hash::check($_POST['password'],$data->password))
            {
                session([
                    'id'=>$data->id,
                ]);
                // return redirect()->back();
                return redirect('/')->with('status','登录成功！');
            }
            else
            {
                return back()->with('status',"密码错误");
            }   
        }
        else
        {
            return back()->with('status','用户名不存在');
        }
    }
}
