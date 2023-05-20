<?php

namespace Database\Seeders;

use App\Models\BulkSMS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BulkSMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BulkSMS::factory()->count(rand(200, 500))->create();
    }
}
