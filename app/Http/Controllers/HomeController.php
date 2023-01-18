<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return view('frontend.profile.home');
        }
      
        
    }

    public function change_password()
    {
        return view('frontend.profile.change_password');
    }

    public function change_password_store(Request $request)
    {
        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success','Password Updated Successfully');
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
         if($request->phone){
            $user->phone = $request->phone;
         }
         $user->update();

         return redirect()->back()->with('success' , 'Profile Updated Successfully!');


    }

    public function address()
    {
        return view('frontend.profile.address');
    }

    public function store_address(Request $request,User $user)
    {
        $user->address = $request->address;
        $user->update();
        return redirect()->back()->with('success','Address Create Successfully');
    }
}
