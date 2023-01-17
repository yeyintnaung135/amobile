<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('frontend.products.products',compact('products'));
    }

    public function products_laptop()
    {
        $products = Product::where('cat_id' , 0)->get();
        $product = Product::latest()->paginate(4);
        return view('frontend.products.product_laptop',compact('products','product'));
    }

    public function product_detail($id)
    {
        $product = Product::findOrFail($id);
        
        $relative_products = Product::where('cat_id',$product->cat_id)->latest()->paginate(4);
        return view('frontend.products.product_detail',compact('product','relative_products'));
    }
}
