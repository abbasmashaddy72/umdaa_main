<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Referral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
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
            'patient_id' => Patient::pluck('id')[fake()->numberBetween(1, Patient::count() - 1)],
            'referral_id' => Referral::pluck('id')[fake()->numberBetween(1, Referral::count() - 1)],
            'date' => fake()->date(),
            'time' => fake()->time(),
        ];
    }
}
