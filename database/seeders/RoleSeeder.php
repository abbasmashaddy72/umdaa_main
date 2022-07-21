<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'title' => 'Admin'
            ],
            [
                'title' => 'Nurse'
            ],
            [
                'title' => 'Doctor'
            ],
            [
                'title' => 'Reception'
            ],
            [
                'title' => 'Employee'
            ]
        ];

        foreach ($data as $key => $item) {
            $item = Role::create($item);
            if ($item == 'Admin') {
                $item->permissions()->sync(Permission::all());
            } elseif ($item == 'Nurse') {
                array_diff($item->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            } elseif ($item == 'Doctor') {
                array_diff($item->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            } elseif ($item == 'Reception') {
                array_diff($item->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            } else {
                array_diff($item->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            }
        }
    }
}
