<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    use HasFactory;
    protected $fillable = ['id','masv','hoten','gioitinh','ngaysinh','phone','address','email','nganh_id','lop_id'];
    protected $hidden =[];
}
