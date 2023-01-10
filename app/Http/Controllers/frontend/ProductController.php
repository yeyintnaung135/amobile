<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return view('frontend.products');
    }

    public function product_detail($id)
    {
        return view('frontend.product_detail');
    }
}
