<?php

namespace Database\Factories;

use App\Models\TinhThanh;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TinhThanh>
 */
class TinhThanhFactory extends Factory
{
    protected $model = TinhThanh::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tenTinhThanh' => 'Đà Nẵng',
        ];
    }
}
