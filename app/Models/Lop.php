<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    use HasFactory;
    protected $fillable = ['tenlop','nganh_id'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
}
