<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diem extends Model
{
    use HasFactory;
    protected $fillable = ['diemlt', 'lop_id', 'diemtt','diemtong','monhoc_id','sinhvien_id','giangvien_id','created_at','updated_at'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
    protected $table = 'diems';
    public function sinhviens(){
        return $this->belongsTo('App\Models\Sinhvien', 'sinhvien_id','id');
    }
    public function monhocs(){
        return $this->belongsTo('App\Models\Monhoc', 'monhoc_id','id');
    }
}
