<?php

namespace App\Http\Controllers\Auth\super_admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
  
    public function index()
    {
        return view('backend.superadmin.dashboard');
    }

   
}
