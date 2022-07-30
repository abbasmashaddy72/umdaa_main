<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = Arr::random(['Male', 'FeMale', 'Trans']);

        return [
            'name' => fake()->name($gender),
            'email' => fake()->unique()->safeEmail(),
            'locality_id' => Locality::pluck('id')[fake()->numberBetween(1, Locality::count() - 1)],
            'gender' => $gender,
            'dob' => fake()->date(),
            'contact_no' => fake()->unique()->numberBetween(7777777777, 999999999),
            'qualification' => Arr::random(['MBBS', 'MD', 'DM']),
            'registration_no' => fake()->unique()->numberBetween(11111, 99999),
            'department_id' => Department::pluck('id')[fake()->numberBetween(1, Department::count() - 1)],
            'registration_fee' => fake()->numberBetween(0, 500),
            'consultation_fee' => fake()->numberBetween(100, 1500),
            'review_link' => fake()->imageUrl(640, 480),
            'about' => fake()->realText(5000, 4),
            'career_start_date' => fake()->date(),
        ];
    }
}
