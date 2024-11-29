<?php

namespace Database\Factories;

use App\Models\QuocTich;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuocTich>
 */
class QuocTichFactory extends Factory
{
    protected $model = QuocTich::class;

    public function definition()
    {
        return [
            'tenQuocTich' => $this->faker->country(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
