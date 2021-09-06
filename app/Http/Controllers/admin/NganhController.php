<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Giangvien;
use App\Models\Lop;
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
    function AllStudent()
    {
        $data = Sinhvien::all();
        return view('admin.menu.student.allstudent', ['sinhvien' => $data]);
    }
    function AllBranch()
    {
        $data = Nganh::all();
        return view('admin.menu.branch.all-branch', ['nganh' => $data]);
    }
    function AllClass()
    {
        $data = Lop::all();
        return view('admin.menu.class.all-class', ['lop' => $data]);
    }
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

    public function addTeacher(Request $request){
        $data = new Giangvien();

        $data->hoten = $request->hoten;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->ngaysinh = $request->ngaysinh;
        $data->gioitinh = $request->gioitinh;
        $data->phone = $request->phone;
        $data->status = $request->status;

        $data->save();
        return response()->json($data);
    }
    public function editTeacher(Request $request){
        $data = new Giangvien();

        $data->hoten = $request->hoten;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->ngaysinh = $request->ngaysinh;
        $data->gioitinh = $request->gioitinh;
        $data->phone = $request->phone;
        $data->status = $request->status;

        $data->save();
        return response()->json($data);
    }

}
