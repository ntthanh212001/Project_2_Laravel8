<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sinhvien;

class SinhvienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sinhvien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'masv' => rand(100000,999999),
            'hoten' => $this->faker->name(),
            'gioitinh' => $this->faker->boolean(),
            'ngaysinh' => $this->faker->date(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2a$12$akr7UPfz24ercuvI2lJdQOXG8RtDfvIQwueGNCYNn3FW9xez1t0gK', // 123456
            'nganh_id' => '3',
            'lop_id' => '7',
        ];
    }
}
