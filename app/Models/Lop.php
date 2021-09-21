<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;
    protected $table = 'lops';
    protected $fillable = ['tenlop','nganh_id'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
    public function sinhviens()
    {
        return $this->hasMany('App\Models\Sinhvien','lop_id','id');
    }
    public function monhocs()
    {
        return $this->belongsToMany('App\Models\Monhoc','nganh_id','id');
    }
}
