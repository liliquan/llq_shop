<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    // 文章列表
    public function article_list()
    {
        return view('admin.article.article_list');
    }

    // 分类管理
    public function article_type()
    {
        return view('admin.article.article_Sort');
    }

    // 添加文章
    public function add_article()
    {
        return view('admin.article.article_add');
    }
}
