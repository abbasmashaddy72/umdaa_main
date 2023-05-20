<?php

namespace Database\Factories;

ini_set('memory_limit', '2048M');

use App\Models\Locality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'house_no' => 'Flat No.' . fake()->numberBetween(0, 214),
            'landmark' => fake()->company(),
            'locality_id' => Locality::pluck('id')[fake()->numberBetween(1, Locality::count() - 1)],
            'pin_code' => fake()->numberBetween(123456, 999999),
            'registration_fee' => fake()->numberBetween(0, 50),
            'available_facilities' => "['Medical', 'Ambulance','Lab','Lift']",
            'manager_name' => fake()->name(),
            'manager_contact_no' => fake()->numberBetween(7777777777, 9999999999),
            'manager_email' => fake()->email()
        ];
    }
}
