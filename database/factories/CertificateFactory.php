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
            'title' => $this->faker->sentence(),
            'company' => $this->faker->company(),
            'certificate_category' => $this->faker->word(),
            'product_id' => $this->faker->randomNumber(9, true),
            'expiry_date' => $this->faker->date(),
            'description' => $this->faker->paragraph(5)
        ];
    }
}
