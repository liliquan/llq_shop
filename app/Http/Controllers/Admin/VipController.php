<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VipController extends Controller
{
    // 会员列表
    public function vip_list()
    {
        return view('admin.vip.user_list');
    }
    // 等级管理
    public function vip_grade()
    {
        return view('admin.vip.member-Grading');
    }
    // 会员记录管理
    public function vip_record()
    {
        return view('admin.vip.integration');
    }
}
