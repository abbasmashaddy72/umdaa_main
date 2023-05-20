<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::pluck('id') as $user_id) {
            if ($user_id == 1) {
                $role_id = 1;
            } else {
                $role_id = Role::pluck('id')[fake()->numberBetween(1, Role::count() - 1)];
            }
            RoleUser::create([
                'user_id' => $user_id,
                'role_id' => $role_id
            ]);
        }
    }
}
