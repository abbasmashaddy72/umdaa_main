<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'department_id' => Department::pluck('id')[fake()->numberBetween(1, Department::count() - 1)],
            'name' => fake()->name(),
            'excerpt' => fake()->realText(500, 4),
            'image' => fake()->imageUrl(640, 480),
        ];
    }
}
