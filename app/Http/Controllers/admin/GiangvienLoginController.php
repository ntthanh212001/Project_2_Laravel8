<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiangvienLoginController extends Controller
{
    function GiangvienFormLogin()
    {
        return view('giangvien.auth.login');
    }
    function login(Request $request)
    {
        if (Auth::guard('giangvien')->attempt([
            'magv' => $request->input('user'),
            'password' => $request->input('password'),
            'status' => 1
        ])) {
            //chuyen huong ve home
            return redirect()->route('giangvien.home');
        } else {
            return redirect()->back()->with('error', 'Thông tin đăng nhập không đúng hoặc bạn không có quyền truy cập');
        }
    }
    function logout()
    {
        Auth::guard('giangvien')->logout();
        return redirect()->route('giangvien.login');
    }
}
