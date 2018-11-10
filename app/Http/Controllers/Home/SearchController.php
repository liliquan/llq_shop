<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\search;

class SearchController extends Controller
{
    public function search($id)
    {
        $model = new search;
        $data = $model->search($id);
        // dd($data);
        return view('home.list.search',['data'=>$data]);
    }
    
}
