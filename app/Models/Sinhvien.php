<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    use HasFactory;
    protected $fillable = ['masv','hoten','gioitinh','phone','address','email','nganh_id','lop_id'];
    protected $hidden =[];
}
