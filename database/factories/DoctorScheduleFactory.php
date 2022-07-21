<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
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
            'day' => Arr::random(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']),
            'from' => fake()->time($max = '12:0:0'),
            'to' => fake()->time($max = '24:0:0'),
            'appointment_duration' => fake()->randomElement(['0', '5', '10', '15'])
        ];
    }
}
