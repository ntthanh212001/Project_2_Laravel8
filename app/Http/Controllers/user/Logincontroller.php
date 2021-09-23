<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Logincontroller extends Controller
{
    //
    function FormLogin(){
        return view('user.auth.login');
    }
    function login(Request $request){
        if (Auth::guard('sinhvien')->attempt([
            'email' => $request->input('user'),
            'password' => $request->input('password'),
            'status' => 1
        ])) {
            //chuyen huong ve home
            $sql = DB::table('sinhvien')
                ->where('email','=', $request->user)
                ->where('password','=', $request->password)
                ->get();

            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Thông tin đăng nhập không đúng hoặc bạn không có quyền truy cập');
        }
    }
    function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
