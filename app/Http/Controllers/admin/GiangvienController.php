<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
    public function ClassTeacherDev(){
        DB::statement(DB::raw('set @rownum = 0'));
        $id_gv = Auth::guard('giangvien')->user()->id;
        $data = DB::table('phancongs')
            ->join('giangviens','phancongs.giangvien_id','=','giangviens.id')
            ->join('monhocs','phancongs.monhoc_id','=','monhocs.id')
            ->join('lops','phancongs.lop_id','=','lops.id')
            ->where('phancongs.giangvien_id',$id_gv)
            ->select(
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'phancongs.*',
                'giangviens.hoten AS hotengv',
                'lops.tenlop AS lop',
                'monhocs.tenmon AS tenmon')
            ->get();
            return view('giangvien.myclass.myclass',['data'=>$data]);
    }
    public function TeacherMarkDev(){
        $id_gv = Auth::guard('giangvien')->user()->id;
        $data = DB::table('diems')
            ->join('giangviens','diems.giangvien_id','=','giangviens.id')
            ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
            ->where('phancongs.giangvien_id',$id_gv)
            ->select(
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'diems.*',
                'giangviens.hoten AS hotengv',
                'sinhviens.masv AS masv',
                'sinhviens.hoten AS tensv',
                'monhocs.tenmon AS tenmon')
            ->get();
        return view('giangvien.mark.markDev',['data'=>$data]);
    }
}
