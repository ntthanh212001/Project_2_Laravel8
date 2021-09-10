<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hocki extends Model
{
    use HasFactory;
    protected $fillable = ['tenhocki'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
}
