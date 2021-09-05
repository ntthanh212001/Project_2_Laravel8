<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logincontroller extends Controller
{
    //
    function FormLogin(){
        return view('user.auth.login');
    }
    function login(Request $request){
        $user = $request->input('user');
        $password = $request->input('password');
        if(Auth::attempt(['email' => $user, 'password' => $password])){
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->with('error','Sai thông tin đăng nhập');
        }
    }
    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
