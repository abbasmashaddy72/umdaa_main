<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorService>
 */
class DoctorServiceFactory extends Factory
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
            'service_id' => Service::pluck('id')[fake()->numberBetween(1, Service::count() - 1)]
        ];
    }
}
