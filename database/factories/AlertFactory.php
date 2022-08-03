<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlertFactory extends Factory
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
            'certificate_id' => $this->faker->randomNumber(9, true),
            'period_id' => $this->faker->randomNumber(9, true),
            'description' => $this->faker->paragraph(5)
        ];
    }
}
