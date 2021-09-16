<?php

namespace App\Imports;

use App\Models\Sinhvien;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SinhvienImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Sinhvien([
            'masv' => $row['masv'],
            'hoten' => $row['hoten'],
            'gioitinh'=> $row['gioitinh'],
            'ngaysinh' =>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['ngaysinh']),
            'phone' => $row['phone'],
            'address' => $row['address'],
            'email' => $row['email'],
            'password'=>Hash::make($row['password']),
            'nganh_id' => $row['nganh_id'],
            'lop_id' => $row['lop_id'],
        ]);
    }
}
