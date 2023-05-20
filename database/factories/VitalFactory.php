<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vital>
 */
class VitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'appointment_id' => Appointment::pluck('id')[fake()->numberBetween(1, Appointment::count() - 1)],
            'pulse_rate' => fake()->numberBetween(60, 100),
            'bp' => fake()->numberBetween(90, 120) . '/' . fake()->numberBetween(60, 80),
            'resp_rate' => fake()->numberBetween(12, 16),
            'temp' => fake()->numberBetween(96, 105),
            'spo2' => fake()->numberBetween(70, 100),
            'height' => fake()->numberBetween(400, 600),
            'weight' => fake()->numberBetween(40, 100),
            'bmi' => fake()->numberBetween(18.5, 30.0),
            'bsa' => fake()->numberBetween(1.0, 2.0),
            'waist' => fake()->numberBetween(100, 200),
            'hip' => fake()->numberBetween(100, 250),
            'wh_ratio' => fake()->numberBetween(.5, 1.0),
        ];
    }
}
