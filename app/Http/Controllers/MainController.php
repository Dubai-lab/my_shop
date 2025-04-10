<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Product;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function login_function(){
        return view(('login_form'));
    }

    public function register_function(){
        return view(('register_form'));
    }

    public function store_user(Request $request){
        $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create new user
        $user = new User();
        $user->name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);  // Hash the password before storing it
        $user->save();

        // Redirect to home or dashboard after registration
        return redirect()->back()->with('success', 'Account Created Successfully!');
    }

    public function signin(Request $request){
       $user_details = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($user_details)){
            return redirect()->route('home_page');
        }else{
            return redirect()->back()->with('success', 'Invalid Login');
        }
    }

    public function home_page(){
        $products = Product::all();
        return view('home_page', ['products'=>$products]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
}
