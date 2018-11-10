<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests\RegistRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Hash;
use App\Models\User;
use DB;

class RegistController extends Controller
{
    // 显示注册表单
    public function regist()
    {
        return view('home.user.register');
    }


    // 发短信
    public function sendmobilecode(Request $req)
    {
        // 生成随机数
        $code = rand(100000,999999);
        
        // 缓存时的名字
        $name = 'code-'.$req->mobile;
        // echo $req->mobile;
        // 保存随机数
        Cache::put($name,$code,10);

        // 发送短信
        $config = [
            'accessKeyId'       => 'LTAICbwvUQPe9RCq',
            'accessKeySecret'   => 'TcWWs3fIjqIXQkbAY1amVs7sPeH3XZ',
        ];  
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($req->mobile);
        $sendSms->setSignName('权世界');
        $sendSms->setTemplateCode('SMS_136485121');
        $sendSms->setTemplateParam(['code' => $code]);
        // 发送
        if($client->execute($sendSms)){
            echo $name;
        }else {
            echo '失败！';
        }
    }


    // 使用RegistRequest类进行表验证：
    // 1. 如果失败返回上一个页面
    // 2. 如果成功才允许继续执行方法中的代码
    public function doregist()
    {
        // 拼出缓存的名字
        $name = 'code-'.$_POST['mobile'];
        // dd($name);
        // 再根据名字取出验证码
        $code = Cache::get($name);

        if(!$code || $code != $_POST['mobile_code'])
        {
            return back()->withErrors(['mobile_code'=>'验证码错误！']);
        }
        
        $model = new User;
        $model->adduser();

        // 跳转到 登录页
        return redirect()->route('home_login');
    }
}
