<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Lop;
use App\Models\Nganh;
use App\Models\Sinhvien;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.admin');
    }
   function index(){
       return view('user.home');
   }
}
