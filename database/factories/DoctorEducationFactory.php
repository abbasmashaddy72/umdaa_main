<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorEducation>
 */
class DoctorEducationFactory extends Factory
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
            'title' => fake()->text(100),
            'completed' => fake()->year(),
            'where' => fake()->address()
        ];
    }
}
