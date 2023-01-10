<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        return view('frontend.news');
    }

    public function product_detail($id)
    {
        return view('frontend.news_detail');
    }
}
