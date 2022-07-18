<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            ['name' => 'Andhra Pradesh'],
            ['name' => 'Arunachal Pradesh'],
            ['name' => 'Assam'],
            ['name' => 'Bihar'],
            ['name' => 'Chandigarh'],
            ['name' => 'Dadra & Nagar Haveli'],
            ['name' => 'Daman & Diu'],
            ['name' => 'Delhi'],
            ['name' => 'Goa'],
            ['name' => 'Gujarat'],
            ['name' => 'Haryana'],
            ['name' => 'Himachal Pradesh'],
            ['name' => 'Jammu & Kashmir'],
            ['name' => 'Jharkhand'],
            ['name' => 'Karnataka'],
            ['name' => 'Kerala'],
            ['name' => 'Lakshadweep'],
            ['name' => 'Madhya Pradesh'],
            ['name' => 'Maharashtra'],
            ['name' => 'Manipur'],
            ['name' => 'Meghalaya'],
            ['name' => 'Mizoram'],
            ['name' => 'Nagaland'],
            ['name' => 'Odisha'],
            ['name' => 'Pondicherry'],
            ['name' => 'Punjab'],
            ['name' => 'Rajasthan'],
            ['name' => 'Sikkim'],
            ['name' => 'Tamil Nadu'],
            ['name' => 'Tripura'],
            ['name' => 'Uttaranchal'],
            ['name' => 'Uttar Pradesh'],
            ['name' => 'West Bengal'],
            ['name' => 'Chhattisgarh'],
            ['name' => 'Andaman & Nicobar Islands'],
            ['name' => 'Telangana'],
        ];

        $chunks = array_chunk($input, 500, true);
        foreach ($chunks as $key => $data) {
            State::insert($data);
        }
    }
}
