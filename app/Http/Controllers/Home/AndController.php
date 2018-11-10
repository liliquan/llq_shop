<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AndController extends Controller
{

    // ***************合作招商----首页
    public function home()
    {
        return view('home.cooperation.cooperation');
    }

    // *************立即入驻
    public function enter()
    {
        return view('home.cooperation.sampling');
    }


}
