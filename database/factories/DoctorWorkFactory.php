<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorWork>
 */
class DoctorWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::pluck('id')[fake()->numberBetween(1, Doctor::count() - 1)],
            'where' => fake()->address(),
            'from' => fake()->year(),
            'to' => fake()->year(),
            'designation' => Arr::random(['MBBS', 'MD', 'DM'])
        ];
    }
}
