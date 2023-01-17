<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function news()
    {
        $posts = Post::all();
        return view('frontend.news.news',compact('posts'));
    }

    public function product_detail($id)
    {
        return view('frontend.news_detail');
    }
}
