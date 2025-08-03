<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // Trả về view hiển thị danh sách bài viết
        return view('bai-viet.index');
    }
}
