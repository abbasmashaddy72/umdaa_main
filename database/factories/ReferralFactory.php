<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Referral>
 */
class ReferralFactory extends Factory
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
            'qualification' => Arr::random(['MBBS', 'MD', 'DM']),
            'department_id' => Department::pluck('id')[fake()->numberBetween(1, Department::count() - 1)],
            'clinic_name' => fake()->company(),
            'contact_no' => fake()->numberBetween(7777777777, 999999999),
            'personal' => fake()->boolean(),
            'location' => fake()->streetAddress()
        ];
    }
}
