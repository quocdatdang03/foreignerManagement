<?php

namespace Database\Factories;

use App\Models\NguoiNuocNgoai;
use App\Models\QuocTich;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NguoiNuocNgoai>
 */
class NguoiNuocNgoaiFactory extends Factory
{
    protected $model = NguoiNuocNgoai::class;

    public function definition()
    {
        return [
            'hoTen' => $this->faker->name(),
            'soPassport' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            'sdt' => $this->faker->numerify('0#########'),
            'email' => $this->faker->unique()->safeEmail(),
            'ngaySinh' => $this->faker->date(),
            'idQuocTich' => QuocTich::inRandomOrder()->first()->idQuocTich,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
