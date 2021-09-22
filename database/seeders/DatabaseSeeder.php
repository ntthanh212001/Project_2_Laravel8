<?php

namespace Database\Seeders;

use App\Models\Diem;
use App\Models\Giangvien;
use App\Models\Sinhvien;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Giangvien::factory(50)->create();
        Diem::factory(50)->create();
        //Sinhvien::factory(20)->create();
    }
}
