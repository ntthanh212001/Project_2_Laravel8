<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    use HasFactory;
    protected $fillable = ['diemtt','diemtong','monhoc_id','sinhvien_id','giangvien_id','created_at','updated_at'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
}
