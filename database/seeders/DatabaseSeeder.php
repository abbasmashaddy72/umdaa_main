<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(LocalitySeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ReferralSeeder::class);
        $this->call(ProcedureSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(DoctorWorkSeeder::class);
        $this->call(DoctorEducationSeeder::class);
        $this->call(DoctorServiceSeeder::class);
        $this->call(DoctorScheduleSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(PatientRelationSeeder::class);
        $this->call(BillingSeeder::class);
        $this->call(BulkSMSSeeder::class);
        Model::reguard();
    }
}
