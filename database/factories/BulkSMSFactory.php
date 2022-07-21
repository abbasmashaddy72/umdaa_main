<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BulkSMS>
 */
class BulkSMSFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'tracking_id' => fake()->numberBetween(123456, 999999),
            'total_sent' => fake()->numberBetween(800, 1000),
            'processed' => fake()->numberBetween(500, 800),
            'invalid' => fake()->numberBetween(10, 20),
            'duplicate' => fake()->numberBetween(0, 10),
            'dnd' => fake()->numberBetween(10, 20),
            'valid' => fake()->numberBetween(800, 1000),
        ];
    }
}
