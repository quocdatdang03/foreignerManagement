<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NguoiDung>
 */
class NguoiDungFactory extends Factory
{
    protected $model = NguoiDung::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idVaiTro' => VaiTro::factory(),
            'email' => $this->faker->email,
            'sdt' => $this->faker->numerify('0#########'),
            'matKhau' => bcrypt('password'),
            'hoVaTen' => $this->faker->name,
            'soCCCD' => $this->faker->numerify('############'),
            'trangThai' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
