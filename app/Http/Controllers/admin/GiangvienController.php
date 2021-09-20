<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lop;
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
        $id_gv = Auth::guard('giangvien')->user()->id;
        $count1 = DB::table('diems')
            ->distinct()
            ->count('monhoc_id');
        $count2 = DB::table('diems')
            ->distinct()
            ->count('lop_id');
        $count3 = DB::table('diems')
            ->distinct()
            ->count('sinhvien_id');
        $data1 = DB::table('diems')
            ->where('giangvien_id',$id_gv)
            ->where('diemlt','<',5)
            ->count('diemlt');



        return view('giangvien.index', [
            'data1'=>$data1,
            'mon'=>$count1,
                'lop'=>$count2,
                'sinhvien'=>$count3
            ]
        );
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
    public function TeacherMarkDev(Request $request){
        $k = $request->k;
        $id_gv = Auth::guard('giangvien')->user()->id;
        if ($k == ''){
            $data = DB::table('diems')
                ->join('giangviens','diems.giangvien_id','=','giangviens.id')
                ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
                ->join('monhocs','diems.monhoc_id','=','monhocs.id')
                ->join('lops','diems.lop_id','=','lops.id')
                ->where('diems.giangvien_id',$id_gv)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'diems.*',
                    'lops.*',
                    'giangviens.hoten AS hotengv',
                    'sinhviens.masv AS masv',
                    'sinhviens.hoten AS tensv',
                    'monhocs.tenmon AS tenmon')
                ->get();
        }else{
            $data = DB::table('diems')
                ->join('giangviens','diems.giangvien_id','=','giangviens.id')
                ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
                ->join('monhocs','diems.monhoc_id','=','monhocs.id')
                ->join('lops','diems.lop_id','=','lops.id')
                ->where('diems.giangvien_id',$id_gv)
                ->where('lops.tenlop','LIKE','%'.$k.'%')
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'diems.*',
                    'lops.*',
                    'giangviens.hoten AS hotengv',
                    'sinhviens.masv AS masv',
                    'sinhviens.hoten AS tensv',
                    'monhocs.tenmon AS tenmon')
                ->get();
        }
        $data2 = DB::table('diems')
            ->join('lops','diems.lop_id','=','lops.id')
            ->where('giangvien_id',$id_gv)
            ->select('lop_id','lops.tenlop')
            ->distinct()
            ->get();

        return view('giangvien.mark.markDev',['data'=>$data,
        'data2'=>$data2,
            'key_class'=>$k,
        ]);
    }
    public function TeachermarkFloject(Request $request){
        $k = $request->k;
        $id_gv = Auth::guard('giangvien')->user()->id;
        if ($k == ''){
            $data = DB::table('diems')
                ->join('giangviens','diems.giangvien_id','=','giangviens.id')
                ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
                ->join('monhocs','diems.monhoc_id','=','monhocs.id')
                ->join('lops','diems.lop_id','=','lops.id')
                ->where('diems.giangvien_id',$id_gv)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'diems.*',
                    'lops.*',
                    'giangviens.hoten AS hotengv',
                    'sinhviens.masv AS masv',
                    'sinhviens.hoten AS tensv',
                    'monhocs.tenmon AS tenmon')
                ->get();
        }else{
            $data = DB::table('diems')
                ->join('giangviens','diems.giangvien_id','=','giangviens.id')
                ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
                ->join('monhocs','diems.monhoc_id','=','monhocs.id')
                ->join('lops','diems.lop_id','=','lops.id')
                ->where('diems.giangvien_id',$id_gv)
                ->where('monhocs.tenmon','LIKE','%'.$k.'%')
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'diems.*',
                    'lops.*',
                    'giangviens.hoten AS hotengv',
                    'sinhviens.masv AS masv',
                    'sinhviens.hoten AS tensv',
                    'monhocs.tenmon AS tenmon')
                ->get();
        }
        $data2 = DB::table('diems')
            ->join('monhocs','diems.monhoc_id','=','monhocs.id')
            ->where('giangvien_id',$id_gv)
            ->select('monhoc_id','monhocs.tenmon')
            ->distinct()
            ->get();

        return view('giangvien.mark.markFloject',['data'=>$data,
            'data2'=>$data2,
            'key_class'=>$k,
        ]);

    }
}
