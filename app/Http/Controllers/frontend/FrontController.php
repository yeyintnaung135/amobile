<?php

namespace App\Http\Controllers\frontend;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        $phones= Product::where('cat_id',1)->get();
        $laptops = Product::where('cat_id',0)->get();
        $new_arrival_phones = Product::where('cat_id',1)->latest()->paginate(4);
        $new_arrival_laptops = Product::where('cat_id',0)->latest()->paginate(4);
        return  view('frontend.index',compact('banner','phones','laptops','new_arrival_phones','new_arrival_laptops'));
    }
}
