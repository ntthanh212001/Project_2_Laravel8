<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Hocki;
use App\Models\Lop;
use App\Models\Monhoc;
use App\Models\Nganh;
use App\Models\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('auth.admin');
    }
    function index()
    {
        return view('admin.index');
    }
    public function allBranch()
    {
        $data = Nganh::all();
        return view('admin.branch.index', ['data' => $data]);
    }

    public function addBranch(Request $request){
        $data = new Nganh();

        $data->tennganh = $request->tennganh;

        $data->save();
        return response()->json($data);

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

    public function allTeacher(){
        $data = Giangvien::all();
        return view('admin.teacher.index', ['data'=>$data]);
    }
    public function allStudent(){
        $data3 = Lop::all();
        $data2 = Nganh::all();
        $data = DB::table('sinhviens')
        ->join('nganhs','sinhviens.nganh_id','=','nganhs.id')
        ->join('lops','sinhviens.lop_id','=','lops.id')
        ->select('sinhviens.*','nganhs.*','lops.*')
        ->get();
        return view('admin.student.index',
        ['data'=>$data,
        'data2'=>$data2,
        'data3'=>$data3
    ]);
    }
    public function AllClass(){
        $data2 = Nganh::all();
        $data = DB::table('lops')
        ->join('nganhs','lops.nganh_id','=','nganhs.id')
        ->select('lops.*','nganhs.tennganh')
        ->orderBy('id','DESC')
        ->get();

        return view('admin.class.index', ['data'=>$data],['data2'=>$data2]);
    }
    public function allObject(){
        $data2 = Hocki::all();
        $data3 = Nganh::all();
        $data = DB::table('monhocs')
        ->join('hockis','monhocs.hocki_id','=','hockis.id')
        ->join('nganhs','monhocs.nganh_id','=','nganhs.id')
        ->select('monhocs.*','nganhs.tennganh','hockis.tenhocki')
        ->orderBy('id','DESC')
        ->get();

        return view('admin.object.index', ['data'=>$data,
        'data2'=>$data2,
        'data3'=>$data3]);
    }
    public function allMark(){
        $data2 = Monhoc::all();
        $data3 = Sinhvien::all();
        $data = DB::table('diems')
        ->join('monhocs','diems.monhoc_id','=','monhocs.id')
        ->join('sinhviens','diems.sinhvien_id','=','sinhviens.id')
        ->join('giangviens','diems.giangvien_id','=','giangviens.id')
        ->select('diems.*','monhocs.tenmon','sinhviens.hoten','giangviens.hotengv')
        ->orderBy('id','DESC')
        ->get();

        return view('admin.mark.index', ['data'=>$data,
        'data2'=>$data2,
        'data3'=>$data3]);
    }
    public function statusUpdate($id){
        $data = DB::table('giangviens')
        ->select('status')
        ->where('id','=',$id)
        ->first();
        if($data->status == '1'){
            $status = '0';
        }else{
            $status = '1';
        }
        $value = array('status' => $status);
        DB::table('giangviens')->where('id',$id)->update($value);
        return redirect()->route('teacher');
    }
    public function addClass(Request $request){
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
    public function addTeacher(Request $request){
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
    public function addStudent(Request $request){
        $data = new Sinhvien();
        $data->masv = $request->masv;
        $data->hoten = $request->hoten;
        $data->gioitinh = $request->gioitinh;
        $data->ngaysinh = $request->ngaysinh;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->nganh_id = $request->nganh_id;
        $data->lop_id = $request->lop_id;

        $data->save();
        return response()->json([
            'success' => 'Thêm sinh vien thành công !',
            'id' => $data->id,
            'masv' => $data->masv,
            'hoten' => $data->hoten,
            'gioitinh' => $data->gioitinh,
            'ngaysinh' => $data->ngaysinh,
            'phone' => $data->phone,
            'address' => $data->address,
            'email' => $data->email,
            'password' => $data->password,
            'nganh_id' => $data->nganh_id,
            'lop_id' => $data->lop_id,
        ]);
    }
    public function addObject(Request $request){
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
    public function getTeacherById($id){
        $data = Giangvien::find($id);
        return response()->json($data);
    }
    public function getStudentById($id){
        $data = Sinhvien::find($id);
        return response()->json($data);
    }

    public function updateTeacher(Request $request){
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
    public function updateStudent(Request $request){
        $data = Sinhvien::find($request->id);
        $data->masv = $request->masv;
        $data->hoten = $request->hoten;
        $data->gioitinh = $request->gioitinh;
        $data->ngaysinh = $request->ngaysinh;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->nganh_id = $request->nganh_id;
        $data->lop_id = $request->lop_id;


        $data->save();
        return response()->json($data);

    }

}
