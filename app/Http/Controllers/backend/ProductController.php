<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\traid\FileUpload;

class ProductController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('getProductPhotos')->latest()->paginate(10);
        // return $products;
        return view('backend.products.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'price' => 'required|integer',
            'stock' => 'required',
        ]);
        
        $folderPath = 'images/products/';
        $product = new Product();
        $product->title = $request->title;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->cat_id = $request->cat_id;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->save();

        if($request->image){
            foreach($request->image as $re){
                $photo = new ProductPhoto();
                $photo->product_id = $product->id;
             
          
                $image_parts = explode(";base64,", $re);
                $image_type_aux = explode("image/", $image_parts[0]);
                // $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
         
                $imageName = uniqid().'_product' . '.png';
         
                $imageFullPath = public_path($folderPath.$imageName);
        
                file_put_contents($imageFullPath, $image_base64);
                $photo->image = $folderPath.$imageName;
                $photo->save();
            
              }
        }

        return response()->json([
          'success' => true,
          'message' => "Product Create Success"
        ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'price' => 'required|integer',
            'description' => 'required',
        ]);

        $folderPath = 'images/products/';
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->cat_id = $request->cat_id;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->save();

        $get_ptroduct_id = ProductPhoto::where('product_id', $product->id)->get();
        if($request->image){
           
              foreach($get_ptroduct_id as $id){
                if($id->image){
                    if(File::exists(public_path($id->image))){
                       File::delete(public_path($id->image));
                    }
        
                }
                $id->ForceDelete();
            }

            foreach($request->image as $re){
                $product_photo = new ProductPhoto();
                 $product_photo->product_id = $product->id;
                $image_parts = explode(";base64,", $re);
                $image_type_aux = explode("image/", $image_parts[0]);
                // $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
         
                $imageName = uniqid().'_product' . '.png';
         
                $imageFullPath = public_path($folderPath.$imageName);
        
                file_put_contents($imageFullPath, $image_base64);
                 $product_photo->image = $folderPath.$imageName;
                 $product_photo->save(); 
                
        
            }
        }

        return response()->json([
          'success' => true,
          'message' => "Product Update Success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = ProductPhoto::where('product_id',$id)->get();
        foreach($photo as $f){
            // if($f->image){
            //     if(File::exists(public_path($f->image))){
            //         File::delete(public_path($f->image));
            //     }
               
            // }
            $f->delete();
        }
      
        Product::findOrFail($id)->delete();

        return redirect()->back()->with('success', "Product Delete Successfully!");

    }
}
