<?php

namespace Database\Seeders;

use App\Models\PatientRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PatientRelation::factory()->count(rand(200, 500))->create();
    }
}
