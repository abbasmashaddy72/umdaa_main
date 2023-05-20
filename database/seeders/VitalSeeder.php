<?php

namespace Database\Seeders;

use App\Models\Vital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vital::factory()->count(rand(200, 300))->create();
    }
}
