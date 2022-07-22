<?php

namespace Database\Factories;

use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'locality_id' => Locality::pluck('id')[fake()->numberBetween(1, Locality::count() - 1)],
            'gender' => Arr::random(['Male', 'FeMale', 'Trans']),
            'blood_group' => Arr::random(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'dob' => fake()->date(),
            'contact_no' => fake()->unique()->numberBetween(7777777777, 999999999),
            'description' => fake()->text(500),
        ];
    }
}
