<?php

namespace App\Exports;

use App\Models\Sinhvien;
use http\Env\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SinhvienExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($empty = false)
    {
        $this->empty = $empty;
    }

    public function collection()
    {
        if ($this->empty){
            return new Collection([]);
        }
        return Sinhvien::all(['id','masv','hoten','gioitinh','ngaysinh','phone','address','email','password','nganh_id','lop_id']);
    }
    public function headings() :array{
        if ($this->empty){
            return ['Masv','Hoten','Gioitinh','Ngaysinh','Phone','Address','Email','Password','Nganh_id','Lop_id'];
        }
        return ['Id','Mã Sinh Viên','Họ tên','Giới tính','Ngày sinh','Số điện thoại','Địa chỉ','Email','Mật khẩu','Ngành Id','Lớp ID'];
    }
}
