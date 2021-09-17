<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Giangvien;

class GiangvienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Giangvien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hoten' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2a$12$akr7UPfz24ercuvI2lJdQOXG8RtDfvIQwueGNCYNn3FW9xez1t0gK', // 123456
            'ngaysinh' => $this->faker->date(),
            'gioitinh' => $this->faker->boolean(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'status' => $this->faker->boolean(),
        ];
    }
}
