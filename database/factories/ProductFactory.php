<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'company_id' => $this->faker->randomNumber(9, true),
            'product_code' => $this->faker->randomNumber(9, true),
            'certificate_id' => $this->faker->randomNumber(9, true),
            'description' => $this->faker->paragraph(5)
        ];
    }
}
