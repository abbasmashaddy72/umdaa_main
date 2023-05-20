<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientRelation>
 */
class PatientRelationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::pluck('id')[fake()->numberBetween(1, Patient::count() - 1)],
            'related_patient_id' => Patient::pluck('id')[fake()->numberBetween(1, Patient::count() - 1)],
            'relation' => Arr::random(['Parent (Father,Mother)', 'Child (Son,Daughter)', 'Spouse (Husband,Wife)', 'Sibling (Brother,Sister)', 'Grandparents (Grandfather,Grandmother)', 'Grandchild (Grandson,Granddaughter)', 'parents Sibling (Uncle,Aunt)', 'Siblings Child (Nephew,Niece)', 'Aunts/Uncles Child (Cousin)']),
        ];
    }
}
