<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role == 2 || Auth::user()->role == 1){
            return redirect('/store-admin/dashboard');
        }else{
            return view('home');
        }
      
        
    }

    public function user_update(Request $request,$id)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

         ]);

         $user = User::findOrFail($id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->update();

         return redirect()->back()->with('success' , 'Profile Updated Successfully!');


    }
}
