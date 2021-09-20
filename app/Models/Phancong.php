<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phancong extends Model
{
    use HasFactory;
    protected $table = "phancongs";
    protected $fillable = ['id','giangvien_id','monhoc_id','lop_id','created_at','updated_at'];
}
