<?php
namespace App\Http\Controllers\traid;

use Illuminate\Support\Facades\Auth;


trait UserRole
{
   public function isSuperAdmin()
   {
        if( Auth::guard('super_admin')->user()->role === 1 ){
            return true;
        }else{
            return abort(404);
        }
   }
}

