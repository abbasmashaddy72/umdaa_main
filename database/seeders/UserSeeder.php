<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(rand(200, 500))->create()->each(
            function ($user) {
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
                    $role = Role::create($item);
                }
                $user->roles()->save($role)->make();
            }
        );
    }
}
