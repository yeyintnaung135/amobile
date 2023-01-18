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

    public function addToCart($id)
    {

        $product = Product::findOrFail($id);

          

        $cart = session()->get('cart', []);

  

        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                "name" => $product->title,

                "quantity" => 1,

                "price" => $product->price,

                "image" => $product->OnePhoto->image

            ];

        }

          

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }

    public function cart()
    {
        return view('frontend.products.addToCart');
    }

        /**

     * Write code on Method

     *

     * @return response()

     */

     public function update(Request $request)

     {
 
         if($request->id && $request->quantity){
 
             $cart = session()->get('cart');
 
             $cart[$request->id]["quantity"] = $request->quantity;
 
             session()->put('cart', $cart);
 
             session()->flash('success', 'Cart updated successfully');
 
         }
 
     }
 
   
 
     /**
 
      * Write code on Method
 
      *
 
      * @return response()
 
      */
 
     public function remove(Request $request)
 
     {
 
         if($request->id) {
 
             $cart = session()->get('cart');
 
             if(isset($cart[$request->id])) {
 
                 unset($cart[$request->id]);
 
                 session()->put('cart', $cart);
 
             }
 
             session()->flash('success', 'Product removed successfully');
 
         }
 
     }
}
