<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Admin', 'Nurse', 'Doctor', 'Reception', 'Employee'];

        foreach ($data as $item) {
            $role = Role::where('title', $item)->first();
            if ($item == 'Admin') {
                $role->permissions()->sync(Permission::all());
            } elseif ($item == 'Nurse') {
                array_diff($role->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            } elseif ($item == 'Doctor') {
                array_diff($role->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            } elseif ($item == 'Reception') {
                array_diff($role->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            } else {
                array_diff($role->permissions()->sync(Permission::inRandomOrder()->limit(rand(0, count(Permission::all())))->get()));
            }
        }
    }
}
