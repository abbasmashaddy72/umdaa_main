<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Procedure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
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
            'procedure_id' => Procedure::pluck('id')[fake()->numberBetween(1, Procedure::count() - 1)],
            'patient_id' => Patient::pluck('id')[fake()->numberBetween(1, Patient::count() - 1)],
            'discount' => fake()->numberBetween(0, 60),
            'round_off' => fake()->numberBetween(0, 100),
            'mode_of_payment' => Arr::random(['Credit Card', 'Debit Card', 'Cash', 'Cheque', 'Digital Payments (UPI; Mobile Wallets)']),
        ];
    }
}
