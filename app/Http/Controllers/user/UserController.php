<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Lop;
use App\Models\Nganh;
use App\Models\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.sinhvien');
    }
   function index(){
       $id_sv = Auth::guard('sinhvien')->user()->id;
       $sql1 = DB::table('diems')
           ->where('diemlt','<',5)
           ->orWhere('diemtt','<',5)
           ->distinct()
           ->count('monhoc_id');
       $sql2 = DB::table('diems')
           ->where('diemlt','<',5)
           ->where('sinhvien_id',$id_sv)
           ->count('diemlt');
       $sql3 = DB::table('diems')
           ->where('diemtt','<',5)
           ->where('sinhvien_id',$id_sv)
           ->count('diemtt');
       return view('user.home',
           [
               'mon'=>$sql1,
                'diem1' =>$sql2,
               'diem2' =>$sql3
           ]);
   }

   function myMark(){
       DB::statement(DB::raw('set @rownum = 0'));
       $id_sv = Auth::guard('sinhvien')->user()->id;
       $sql= DB::table('diems')
           ->join('monhocs','monhocs.id','=','diems.monhoc_id')
           ->where('sinhvien_id',$id_sv)
           ->select(
               DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'diems.diemlt AS diemlythuyet',
                'diems.diemtt AS diemthuchanh',
               'monhocs.tenmon AS monhoc'

           )
           ->get();
        return view('user.mymark.mymark',
        [
            'data'=> $sql
        ]
        );
   }
    function failObject(){
        DB::statement(DB::raw('set @rownum = 0'));
        $id_sv = Auth::guard('sinhvien')->user()->id;
        $sql= DB::table('diems')
            ->join('monhocs','monhocs.id','=','diems.monhoc_id')
            ->where('sinhvien_id',$id_sv)
            ->select(
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'diems.diemlt AS diemlythuyet',
                'diems.diemtt AS diemthuchanh',
                'monhocs.tenmon AS monhoc'

            )
            ->get();
        return view('user.mymark.failobject',
            [
                'data'=> $sql
            ]
        );
    }
}
