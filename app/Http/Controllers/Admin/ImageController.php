<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    // 广告
    public function adver()
    {
        return view('admin.image.advertising');
    }

    // 分类管理
    public function img_type()
    {
        return view('admin.image.sort_ads');
    }
}
