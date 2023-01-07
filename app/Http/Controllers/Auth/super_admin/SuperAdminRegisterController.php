<?php

namespace App\Http\Controllers\Auth\super_admin;

use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminRegisterController extends Controller
{
    public function index()
    {
        return view('backend.superadmin.auth.register');
    }
    
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:super_admins'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }


    public function create(Request $request)
    {
        $valid = $this->validator($request->except('_token'));
        if( $valid->fails())
        {
            return redirect()->back()->withErrors($valid)->withInput();
        }
        $data = $request->except("_token");
        $super_admin_data = SuperAdmin::create([
            'name' => $data['name'],
            'role' => 0,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('store_admin.dashboard');
    }
}
