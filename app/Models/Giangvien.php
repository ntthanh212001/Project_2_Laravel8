<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Giangvien extends Authenticatable
{
    use HasFactory;
    protected $table = "giangviens";
    protected $fillable = ["hoten", "email", "ngaysinh", "gioitinh", "phone", "status","password"];
    protected $hidden = [];
}
