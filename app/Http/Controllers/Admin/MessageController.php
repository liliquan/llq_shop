<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    // 留言列表
    public function guestbook()
    {
        return view('admin.message.Guestbook');
    }

    // 意见反馈
    public function feedback()
    {
        return view('admin.message.feedback');
    }
}
