<?php

namespace Database\Seeders;

use App\Models\StaticOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'option_name' => 'name',
                'option_value' => 'Test Clinic'
            ],
            [
                'option_name' => 'email',
                'option_value' => 'test_clinic.laravel.com'
            ],
            [
                'option_name' => 'logo',
                'option_value' => ''
            ],
            [
                'option_name' => 'gst',
                'option_value' => '07AABCU9603R1ZP'
            ]
        ];

        foreach ($data as $item) {
            StaticOption::create($item);
        }
    }
}
