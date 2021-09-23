<?php

namespace App\Exports;

use App\Models\Diem;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiemExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  __construct($empty = false)
    {
        $this->empty = $empty;
    }

    public function collection()
    {
        if ($this->empty){
            return new Collection([]);
        }
        return Diem::all(['id','diemlt','diemtt','diemtong','monhoc_id','lop_id','sinhvien_id','giangvien_id','created_at','updated_at']);
    }
    public function headings() :array{
        if ($this->empty){
            return ['Diemlt','Diemtt','Monhoc_id','Lop_id','Sinhvien_id','Giangvien_id','Created_at','Updated_at'];
        }
        return ['Id','Điểm lý thuyết','Điểm Thực Hành','Điểm Tổng','Môn học','Lớp','Sinh viên ','Giảng viên ','Tạo lúc','Cập nhật lúc'];
    }
}
