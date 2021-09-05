<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    function AdminFormLogin()
    {
        return view('admin.auth.login');
    }
    function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request->input('user'),
            'password' => $request->input('password')
        ])) {
            //chuyen huong ve home
            return redirect()->route('admin.home');
        } else {
            return redirect()->back()->with('error', 'Bạn không có quyền');
        }
    }
    function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
