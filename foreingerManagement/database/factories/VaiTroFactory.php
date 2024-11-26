<?php

namespace Database\Factories;

use App\Models\VaiTro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VaiTro>
 */
class VaiTroFactory extends Factory
{
    protected $model = VaiTro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tenVaiTro' => $this->faker->randomElement(['Admin', 'User','Manager']),
        ];
    }
}
