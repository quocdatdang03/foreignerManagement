<?php

namespace Database\Factories;

use App\Models\CoSoLuuTru;
use App\Models\NguoiDung;
use App\Models\PhuongXa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoSoLuuTru>
 */
class CoSoLuuTruFactory extends Factory
{
    protected $model = CoSoLuuTru::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idPhuongXa' => PhuongXa::factory(),
            'idNguoiDung' => NguoiDung::factory(),
            'tenCoSo' => $this->faker->company,
            'diaChiCoSo' => $this->faker->address,
            'sdt' => $this->faker->numerify('0#########'),
            'email' => $this->faker->email,
            'loaiHinh' => $this->faker->randomElement(['Khách sạn', 'Nhà nghỉ', 'Homestay', 'Resort']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
