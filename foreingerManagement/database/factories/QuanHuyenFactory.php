<?php

namespace Database\Factories;

use App\Models\QuanHuyen;
use App\Models\TinhThanh;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuanHuyen>
 */
class QuanHuyenFactory extends Factory
{
    protected $model = QuanHuyen::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idTinhThanh' => TinhThanh::factory(),  // Sử dụng factory của TinhThanh để tạo khóa ngoại
            'tenQuanHuyen' => $this->faker->word,
        ];
    }
}
