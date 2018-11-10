<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    // 系统设置
    public function setup()
    {
        return view('admin.system.Systems');
    }


    // 系统栏目管理
    public function section()
    {
        return view('admin.system.System_section');
    }


    // 系统日志
    public function log()
    {
        return view('admin.system.System_logs');
    }

}
