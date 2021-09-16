<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sinhvien extends Model
{
    use HasFactory;
    protected $table = "sinhviens";
    protected $fillable = ['id','masv','hoten','gioitinh','ngaysinh','phone','address','email','nganh_id','lop_id'];
   public static function getSinhvien(){
       $record = DB::table('sinhviens')->select('id','masv','hoten','gioitinh','ngaysinh','phone','address','email','nganh_id','lop_id');
       return $record;
   }
}
