<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{

    public function index()
    {
        $banner = Banner::all();
        return view('backend.banner.lists',compact('banner'));
    }
    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate(['file' => 'required'],['file.required' => 'Image Required']);
        $file = $request->file('file');
        $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/banner/'), $newFileName);
        $banner = new Banner();
        $banner->image = 'images/banner/' . $newFileName;
        $banner->save();

        return redirect('store-admin/banner/all')->with('success','Banner Create Successfully');
        
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit',compact('banner'));
    }

    public function update(Request $request,$id)
    {
        
        $banner = Banner::findOrFail($id);
        $file = $request->file('file');
        if($file){
            if(File::exists(public_path($banner->image))){
                File::delete(public_path($banner->image));
            }

            $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/banner/'), $newFileName); 
            $banner->image = 'images/banner/' . $newFileName;
            $banner->update();
     
        }


        return redirect('store-admin/banner/all')->with('success','Banner Updated Successfully');
        
    }

    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        if($banner->image){
            if(File::exists(public_path($banner->image))){
                File::delete(public_path($banner->image));
            }
           $banner->delete();
        }

        return redirect()->back();
         
    }
}
