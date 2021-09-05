<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;
    protected $fillable = ['tennganh'];
    public $timestamps = true;
    // const updated_at =null;
    protected $hidden =[''];
    
}
