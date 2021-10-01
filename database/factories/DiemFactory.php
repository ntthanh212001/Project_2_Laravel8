<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diem;

class DiemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Diem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diemlt' => rand(1,10),
            'diemtt' => rand(1,10),
            'diemtong' => rand(1,100),
            'monhoc_id' => rand(1,15),
            'lop_id' =>  rand(1,12),
            'sinhvien_id' => rand(5,10),
            'giangvien_id' => '1'

        ];
    }
}
