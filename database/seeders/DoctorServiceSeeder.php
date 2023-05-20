<?php

namespace Database\Seeders;

use App\Models\DoctorService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorService::factory()->count(rand(200, 500))->create();
    }
}
