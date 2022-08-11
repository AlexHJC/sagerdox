<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'company_id' => $this->faker->randomNumber(9, true),
            'category' => $this->faker->word(),
            'product_code' => $this->faker->randomNumber(9, true),
            'expiry_date' => $this->faker->date(),
            'description' => $this->faker->paragraph(2)
        ];
    }
}
