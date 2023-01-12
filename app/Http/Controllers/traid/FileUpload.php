<?php
namespace App\Http\Controllers\traid;

use Illuminate\Support\Facades\Auth;


trait FileUpload
{
   public function base64_encode($request,$folderPath)
   {
    foreach($request as $re){
        $image_parts = explode(";base64,", $re);
        $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = public_path($folderPath.$imageName);

     
        file_put_contents($imageFullPath, $image_base64);
      }

      return $imageName;
    }
}