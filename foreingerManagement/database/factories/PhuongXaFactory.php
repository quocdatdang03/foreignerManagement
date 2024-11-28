<?php

namespace Database\Factories;

use App\Models\PhuongXa;
use App\Models\QuanHuyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhuongXa>
 */
class PhuongXaFactory extends Factory
{
    protected $model = PhuongXa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idQuanHuyen' => QuanHuyen::factory(),
            'tenPhuongXa' => $this->faker->name,
        ];
    }
}
