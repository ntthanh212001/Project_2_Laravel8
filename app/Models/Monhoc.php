<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    use HasFactory;
    protected $fillable = ['tenmon','sogio','hocki_id','nganh_id'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
}
