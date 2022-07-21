<?php

namespace Database\Seeders;

use App\Models\DoctorWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DoctorWork::factory()->count(rand(200, 500))->create();
    }
}
