<?php

/** @noinspection ALL */

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Imports\SinhvienImport;
use App\Models\Admin;
use App\Models\Giangvien;
use App\Models\Hocki;
use App\Models\Lop;
use App\Models\Monhoc;
use App\Models\Nganh;
use App\Models\Sinhvien;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SinhvienExport;
use App\Models\Diem;
use http\Exception;
use phpDocumentor\Reflection\Types\False_;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.admin');
        $nganhs = Nganh::count();
        $lops = Lop::count();
        $giangviens = Giangvien::count();
        $sinhviens = Sinhvien::count();
        view()->share('nganhs', $nganhs);
        view()->share('lops', $lops);
        view()->share('giangviens', $giangviens);
        view()->share('sinhviens', $sinhviens);
    }
    function index()
    {
        $data = Admin::all();
        return view('admin.index', ['data' => $data]);
    }
    function showFormExcelStudent()
    {

        return view('admin.student.FormExcelStudent');
    }
    public function allBranch()
    {
        $data = Nganh::all();
        return view('admin.branch.index', ['data' => $data]);
    }

    public function addBranch(Request $request): JsonResponse
    {
        $data = new Nganh();

        $data->tennganh = $request->tennganh;

        $data->save();
        return response()->json($data);
    }

    public function showFormStudent()
    {
        $data = Lop::all();
        $data2 = Nganh::all();
        return view('admin.student.addstudent', [
            'data' => $data,
            'data2' => $data2
        ]);
    }
    /* function AllClass()
    {
        $data = Lop::all();
        return view('admin.menu.class.all-class', ['lop' => $data]);
    } */
    /* function FormInsertBranch()
    {
        return view('admin.menu.branch.insert-branch');
    }
    function FormEditBranch($id){
        $data = Nganh::find($id);
        return view('admin.menu.branch.edit-branch',['data' => $data]);
    }
    function insertbranch(Request $request)
    {
        // $name = $request->input('namebranch');
        $now = now();
        $sql = DB::table('nganhs')->insert([
            'tennganh' => $request->input('namebranch'),
            // "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "created_at" => $now, # new \Datetime()
            "updated_at" => $now, # new \Datetime()
        ]);
        if ($sql) {
            return redirect()->route('branch')->with('succsess', 'Thêm thành công ');
        } else {
            return back()->with('error', 'Lỗi ! hãy thử lại');
        }
    }

    function EditBranchtbranch($id,Request $request){
        $now = now();
       $sql =  DB::table('nganhs')->where('id', $id)->update([
            'tennganh' => $request->input('namebranch'),
            "updated_at" => $now,
        ]);
        if ($sql) {
            return redirect()->route('branch')->with('succsess', 'Sửa thành công ');
        } else {
            return back()->with('error', 'Lỗi ! hãy thử lại');
        }
    }
    function deletebranch($id)
    {
        $sql =  DB::table('nganhs')->where('id', '=', $id)->delete();
        if ($sql) {
            return redirect()->route('branch')->with('succsess_delete', 'Xoá thành công ');
        } else {
            return back()->with('error', 'Lỗi không thể xoá! hãy thử lại');
        }
    } */

    public function allTeacher()
    {
        $data = Giangvien::all();
        return view('admin.teacher.index', ['data' => $data]);
    }
    public function allStudent()
    {
        $data3 = Lop::all();
        $data2 = Nganh::all();
        $data = DB::table('sinhviens')
            ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
            ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
            ->select('sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
            ->get();
        return view(
            'admin.student.ListLT',
            [
                'data' => $data,
                'data2' => $data2,
                'data3' => $data3
            ]
        );
    }
    public function studenDev(Request $request)
    {
        DB::statement(DB::raw('set @rownum = 0'));
        $k = $request->k;
        $data3 = DB::table('lops')
            ->where('nganh_id','=',1)
            ->get();
        $data2 = Nganh::all();
        if ($k == ''){
            $data = DB::table('sinhviens')
                ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
                ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
                ->where('sinhviens.nganh_id', 1)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
                ->get();
        }else{
            $data = DB::table('sinhviens')
                ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
                ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
                ->where('sinhviens.nganh_id', 1)
                ->where('lops.tenlop','LIKE','%'.$k.'%')
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
                ->get();
        }
        return view(
            'admin.student.listLT',
            [
                'data' => $data,
                'data2' => $data2,
                'data3' => $data3,
                'key_class' => $k
            ]
        );
    }
    public function studenQtht(Request $request)
    {
        DB::statement(DB::raw('set @rownum = 0'));
        $k = $request->k;
        $data3 = DB::table('lops')
        ->where('nganh_id','=',2)
            ->get();
        $data2 = Nganh::all();
        if ($k == ''){
            $data = DB::table('sinhviens')
                ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
                ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
                ->where('sinhviens.nganh_id', 2)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
                ->get();
        }else{
            $data = DB::table('sinhviens')
                ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
                ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
                ->where('sinhviens.nganh_id', 2)
                ->where('lops.tenlop','LIKE','%'.$k.'%')
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
                ->get();
        }
        return view(
            'admin.student.ListQTHT',
            [

                'data' => $data,
                'data2' => $data2,
                'data3' => $data3,
                'key_class' => $k
            ]
        );
    }
    public function studenTkdh(Request $request)
    {
        DB::statement(DB::raw('set @rownum = 0'));
        $k = $request->k;
        $data3 = DB::table('lops')
            ->where('nganh_id','=',3)
            ->get();
        $data2 = Nganh::all();
        if ($k == ''){
            $data = DB::table('sinhviens')
                ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
                ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
                ->where('sinhviens.nganh_id', 3)
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
                ->get();
        }else{
            $data = DB::table('sinhviens')
                ->join('nganhs', 'sinhviens.nganh_id', '=', 'nganhs.id')
                ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
                ->where('sinhviens.nganh_id', 3)
                ->where('lops.tenlop','LIKE','%'.$k.'%')
                ->select(
                    DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                    'sinhviens.*', 'nganhs.tennganh', 'lops.tenlop')
                ->get();
        }
        return view(
            'admin.student.listTKĐH',
            [
                'data' => $data,
                'data2' => $data2,
                'data3' => $data3,
                'key_class' => $k
            ]
        );
    }
    public function AllClass()
    {
        $name = Admin::all();
        $data2 = Nganh::all();
        $data1 = DB::table('lops')
            ->join('nganhs', 'lops.nganh_id', '=', 'nganhs.id')
            ->select('lops.*', 'nganhs.tennganh')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.class.index', ['data1' => $data1], ['data2' => $data2, 'data' => $name]);
    }
    public function allObject()
    {
        $name = Admin::all();
        $data2 = Hocki::all();
        $data3 = Nganh::all();
        $data1 = DB::table('monhocs')
            ->join('hockis', 'monhocs.hocki_id', '=', 'hockis.id')
            ->join('nganhs', 'monhocs.nganh_id', '=', 'nganhs.id')
            ->select('monhocs.*', 'nganhs.tennganh', 'hockis.tenhocki')
            ->orderBy('id', 'ASC')
            ->get();

        return view('admin.object.index', [
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data' => $name
        ]);
    }
    public function objectDev()
    {
        $data2 = Hocki::all();
        $data3 = Nganh::all();
        $data = DB::table('monhocs')
            ->join('hockis', 'monhocs.hocki_id', '=', 'hockis.id')
            ->join('nganhs', 'monhocs.nganh_id', '=', 'nganhs.id')
            ->select('monhocs.*', 'nganhs.tennganh', 'hockis.tenhocki')
            ->where('monhocs.nganh_id', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.object.index', [
            'data' => $data,
            'data2' => $data2,
            'data3' => $data3
        ]);
    }




    public function markDev(Request $request)
    {
        /* $data2 = Monhoc::all();
        $data3 = Sinhvien::all();
        $data = DB::table('diems')
        ->join('monhocs','diems.monhoc_id','=','monhocs.id')
        ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
        ->join('giangviens','diems.giangvien_id','=','giangviens.id')
        ->select('diems.*','monhocs.tenmon','sinhviens.hoten','giangviens.hotengv')
        ->where('')
        ->orderBy('id','DESC')
        ->get();

        return view('admin.mark.index', ['data'=>$data,
        'data2'=>$data2,
        'data3'=>$data3]); */
        $search_lop = $request->search_lop;
        $search_mh = $request->search_mh;

        $data1 = DB::table('lops')->where('nganh_id',1)->get();
        $data2 = DB::table('monhocs')->where('nganh_id',1)->get();;


        DB::statement(DB::raw('set @rownum = 0'));
        $name = Admin::all();
        $student = DB::table('sinhviens')
            ->join('diems', 'sinhviens.id', '=', 'diems.sinhvien_id')
            ->join('monhocs', 'diems.monhoc_id', '=', 'monhocs.id')
            ->join('lops', 'sinhviens.lop_id', '=', 'lops.id')
            ->where('sinhviens.nganh_id',1)
            ->select([
                DB::raw('@rownum  := @rownum  + 1 AS rownum'),
                'masv',
                'hoten',
                'tenlop',
                'diemlt',
                'diemtt',
                'tenmon',
                'sinhviens.id AS sv_id',
                'diems.id AS diem_id',
                'monhocs.id AS monhoc_id'
            ])->get();
        return view('admin.mark.markLT', [
            'student' => $student,
            'name' => $name,
            'data1' =>$data1,
            'data2' =>$data2,
            'k1' =>$search_lop,
            'k2' =>$search_mh
        ]);
    }

    public function savediem(Request $request)
    {
        $diemso = $_POST['diem'];
        $sv_id = $_POST['sv_id'];
        $monhoc_id = $_POST['monhoc_id'];
        $diem_id = $_POST['diem_id'];
        $column = $_POST['column'];
        if ($diemso == "") {
            $diemso = null;
        }
        if ($column == 'diemlt') {
            $diem = Diem::find($diem_id);
            $diem->diemlt = $diemso;
            $diem->sinhvien_id = $sv_id;
            $diem->monhoc_id = $monhoc_id;
            $diem->save();
            return Response::json([
                'error' => 1,
                'message' => 'Lưu thành công'
            ]);
            /* return response()->json(); */
        }
        if ($column == 'diemtt') {
            $diem = Diem::find($diem_id);
            $diem->diemtt = $diemso;
            $diem->sinhvien_id = $sv_id;
            $diem->monhoc_id = $monhoc_id;
            $diem->save();
            return Response::json([
                'error' => 1,
                'message' => 'Lưu thành công'
            ]);
            /* return response()->json(); */
        }
    }
    /* DB::raw("UPDATE diems SET ". $_POST["column"] . "= '".$_POST["diem"]."' WHERE id=".$_POST["id"]); */
    /* $sql = "UPDATE diems SET ". $_POST["column"] . "= '".$_POST["diem"]."' WHERE id=".$_POST["id"];
        executeUpdate($sql); */
    public function statusUpdate($id): \Illuminate\Http\RedirectResponse
    {
        $data = DB::table('giangviens')
            ->select('status')
            ->where('id', '=', $id)
            ->first();
        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }
        $value = array('status' => $status);
        DB::table('giangviens')->where('id', $id)->update($value);
        return redirect()->route('teacher');
    }
    public function addClass(Request $request)
    {
        $data = new Lop();
        $data->tenlop = $request->tenlop;
        $data->nganh_id = $request->tennganh;
        $data->save();
        return response()->json([
            'success' => 'Thêm lớp thành công !',
            'id' => $data->id,
            'tenlop' => $data->tenlop,
            'nganh_id' => $data->tennganh,

        ]);
    }
    public function addTeacher(Request $request)
    {
        $data = new Giangvien();

        $data->hotengv = $request->hotengv;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->ngaysinh = $request->ngaysinh;
        $data->gioitinh = $request->gioitinh;
        $data->phone = $request->phone;
        $data->status = $request->status;

        $data->save();
        return response()->json($data);
    }

    public function addStudent(Request $request)
    {
        $request->validate([
            'masv' => 'required|unique:sinhviens',
            'hoten' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'phone' => 'required|unique:sinhviens',
            'address' => 'required',
            'email' => 'required|unique:sinhviens',
            'password' => 'required',
            'nganh_id' => 'required',
            'lop_id' => 'required',
        ]);
        $data = Sinhvien::create([
            'masv' => $request->input('masv'),
            'hoten' => $request->input('hoten'),
            'gioitinh' => $request->input('gioitinh'),
            'ngaysinh' => $request->input('ngaysinh'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'nganh_id' => $request->input('nganh_id'),
            'lop_id' => $request->input('lop_id'),

        ]);
        return redirect()->route('student')->with('success', 'Thêm sinh viên thành công');
    }
    public function addObject(Request $request)
    {
        $data = new Monhoc();
        $data->tenmon = $request->tenmon;
        $data->sogio = $request->sogio;
        $data->hocki_id = $request->hocki_id;
        $data->nganh_id = $request->nganh_id;


        $data->save();
        return response()->json([
            'success' => 'Thêm Môn học thành công !',
            'id' => $data->id,
            'tenmon' => $data->tenmon,
            'sogio' => $data->sogio,
            'hocki_id' => $data->hocki_id,
            'nganh_id' => $data->nganh_id,

        ]);
    }
    public function getTeacherById($id)
    {
        $data = Giangvien::find($id);
        return response()->json($data);
    }
    public function ShowDataStudent($id)
    {
        $nganhs = Nganh::get('tennganh');
        $data3 = Lop::all();
        $data = Sinhvien::find($id);
        view()->share('nganhs', $nganhs);
        return view(
            'admin.student.editstudent',
            [
                'data2' => $nganhs,
                'data3' => $data3,
                'data' => $data,
            ]
        );
    }

    public function updateTeacher(Request $request)
    {
        $data = Giangvien::find($request->id);

        $data->hotengv = $request->hotengv;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->ngaysinh = $request->ngaysinh;
        $data->gioitinh = $request->gioitinh;
        $data->phone = $request->phone;


        $data->save();
        return response()->json($data);
    }
    public function updateStudent(Request $request)
    {
        $request->validate([
            'masv' => 'required',
            'hoten' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nganh_id' => 'required',
            'lop_id' => 'required',
        ]);
        $id = $request->input('id');
        $data = Sinhvien::find($id);
        $data->masv = $request->input('masv');
        $data->hoten = $request->input('hoten');
        $data->gioitinh = $request->input('gioitinh');
        $data->ngaysinh = $request->input('ngaysinh');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->email = $request->input('email');
        $data->password = $request->input('password');
        $data->nganh_id = $request->input('nganh_id');
        $data->lop_id = $request->input('lop_id');
        $data->save();
        return redirect()->route('student')->with('success', 'Thành công');
    }

    public function exportSinhvien()
    {
        return Excel::download(new SinhvienExport, 'sinhvien.xlsx');
    }
    public function sampleSinhvien()
    {
        return Excel::download(new SinhvienExport(true), 'sinhviensample.xlsx');
    }
    public function importSinhvien(Request $request)
    {

        Excel::import(new SinhvienImport, $request->file('sample'));
        return redirect()->route('student.dev');
    }

   public function previewSinhvien(Request $request){
       $sinhvien = Excel::toArray(new SinhvienImport, $request->file('sample'));
       return view('admin.student.previewSinhvien',['sinhviens'=>$sinhvien[0]]);
    }


}
