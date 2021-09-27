<?php

namespace App\Imports;

use App\Models\Diem;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiemImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Diem([
            'diemlt' => $row['diemlt'],
            'diemtt' => $row['diemtt'],
            'monhoc_id' => $row['monhoc_id'],
            'lop_id' => $row['lop_id'],
            'sinhvien_id' => $row['sinhvien_id'],
            'giangvien_id' => $row['giangvien_id'],
//
        ]);
    }
}
