<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiangvienController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.giangvien');
    }
    function index()
    {
        return view('giangvien.index');
    }
    public function ClassTeacher(){
            return view('giangvien.myclass.myclass');
    }
}
