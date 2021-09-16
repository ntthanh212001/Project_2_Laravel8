<?php

namespace App\Imports;

use App\Models\Sinhvien;
use Maatwebsite\Excel\Concerns\ToModel;

class SinhvienImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sinhvien([
            //
        ]);
    }
}
