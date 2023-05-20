<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
                'title' => 'List User',
                'slug' => 'list_users',
                'model' => 'User'
            ],
            [
                'title' => 'Show User',
                'slug' => 'show_users',
                'model' => 'User'
            ],
            [
                'title' => 'Create User',
                'slug' => 'create_users',
                'model' => 'User'
            ],
            [
                'title' => 'Edit User',
                'slug' => 'edit_users',
                'model' => 'User'
            ],
            [
                'title' => 'Destroy User',
                'slug' => 'destory_users',
                'model' => 'User'
            ],
            [
                'title' => 'List Role',
                'slug' => 'list_roles',
                'model' => 'Role'
            ],
            [
                'title' => 'Show Role',
                'slug' => 'show_roles',
                'model' => 'Role'
            ],
            [
                'title' => 'Create Role',
                'slug' => 'create_roles',
                'model' => 'Role'
            ],
            [
                'title' => 'Edit Role',
                'slug' => 'edit_roles',
                'model' => 'Role'
            ],
            [
                'title' => 'Destroy Role',
                'slug' => 'destory_roles',
                'model' => 'Role'
            ],
            [
                'title' => 'List Branch',
                'slug' => 'list_branches',
                'model' => 'Branch'
            ],
            [
                'title' => 'Show Branch',
                'slug' => 'show_branches',
                'model' => 'Branch'
            ],
            [
                'title' => 'Create Branch',
                'slug' => 'create_branches',
                'model' => 'Branch'
            ],
            [
                'title' => 'Edit Branch',
                'slug' => 'edit_branches',
                'model' => 'Branch'
            ],
            [
                'title' => 'Destroy Branch',
                'slug' => 'destory_branches',
                'model' => 'Branch'
            ],
            [
                'title' => 'List Department',
                'slug' => 'list_departments',
                'model' => 'Department'
            ],
            [
                'title' => 'Show Department',
                'slug' => 'show_departments',
                'model' => 'Department'
            ],
            [
                'title' => 'Create Department',
                'slug' => 'create_departments',
                'model' => 'Department'
            ],
            [
                'title' => 'Edit Department',
                'slug' => 'edit_departments',
                'model' => 'Department'
            ],
            [
                'title' => 'Destroy Department',
                'slug' => 'destory_departments',
                'model' => 'Department'
            ],
            [
                'title' => 'List Referal',
                'slug' => 'list_referals',
                'model' => 'Referal'
            ],
            [
                'title' => 'Show Referal',
                'slug' => 'show_referals',
                'model' => 'Referal'
            ],
            [
                'title' => 'Create Referal',
                'slug' => 'create_referals',
                'model' => 'Referal'
            ],
            [
                'title' => 'Edit Referal',
                'slug' => 'edit_referals',
                'model' => 'Referal'
            ],
            [
                'title' => 'Destroy Referal',
                'slug' => 'destory_referals',
                'model' => 'Referal'
            ],
            [
                'title' => 'List Procedure',
                'slug' => 'list_procedures',
                'model' => 'Procedure'
            ],
            [
                'title' => 'Show Procedure',
                'slug' => 'show_procedures',
                'model' => 'Procedure'
            ],
            [
                'title' => 'Create Procedure',
                'slug' => 'create_procedures',
                'model' => 'Procedure'
            ],
            [
                'title' => 'Edit Procedure',
                'slug' => 'edit_procedures',
                'model' => 'Procedure'
            ],
            [
                'title' => 'Destroy Procedure',
                'slug' => 'destory_procedures',
                'model' => 'Procedure'
            ],
            [
                'title' => 'List Patient',
                'slug' => 'list_patients',
                'model' => 'Patient'
            ],
            [
                'title' => 'Show Patient',
                'slug' => 'show_patients',
                'model' => 'Patient'
            ],
            [
                'title' => 'Create Patient',
                'slug' => 'create_patients',
                'model' => 'Patient'
            ],
            [
                'title' => 'Edit Patient',
                'slug' => 'edit_patients',
                'model' => 'Patient'
            ],
            [
                'title' => 'Destroy Patient',
                'slug' => 'destory_patients',
                'model' => 'Patient'
            ],
            [
                'title' => 'List Doctor',
                'slug' => 'list_doctors',
                'model' => 'Doctor'
            ],
            [
                'title' => 'Show Doctor',
                'slug' => 'show_doctors',
                'model' => 'Doctor'
            ],
            [
                'title' => 'Create Doctor',
                'slug' => 'create_doctors',
                'model' => 'Doctor'
            ],
            [
                'title' => 'Edit Doctor',
                'slug' => 'edit_doctors',
                'model' => 'Doctor'
            ],
            [
                'title' => 'Destroy Doctor',
                'slug' => 'destory_doctors',
                'model' => 'Doctor'
            ],
            [
                'title' => 'List Appointment',
                'slug' => 'list_appointments',
                'model' => 'Appointment'
            ],
            [
                'title' => 'Show Appointment',
                'slug' => 'show_appointments',
                'model' => 'Appointment'
            ],
            [
                'title' => 'Create Appointment',
                'slug' => 'create_appointments',
                'model' => 'Appointment'
            ],
            [
                'title' => 'Edit Appointment',
                'slug' => 'edit_appointments',
                'model' => 'Appointment'
            ],
            [
                'title' => 'Destroy Appointment',
                'slug' => 'destory_appointments',
                'model' => 'Appointment'
            ],
            [
                'title' => 'List Bill',
                'slug' => 'list_bills',
                'model' => 'Bill'
            ],
            [
                'title' => 'Show Bill',
                'slug' => 'show_bills',
                'model' => 'Bill'
            ],
            [
                'title' => 'Create Bill',
                'slug' => 'create_bills',
                'model' => 'Bill'
            ],
            [
                'title' => 'Edit Bill',
                'slug' => 'edit_bills',
                'model' => 'Bill'
            ],
            [
                'title' => 'Destroy Bill',
                'slug' => 'destory_bills',
                'model' => 'Bill'
            ],
            [
                'title' => 'List BulkSMS',
                'slug' => 'list_bulksms',
                'model' => 'BulkSMS'
            ],
            [
                'title' => 'Show BulkSMS',
                'slug' => 'show_bulksms',
                'model' => 'BulkSMS'
            ],
            [
                'title' => 'Create BulkSMS',
                'slug' => 'create_bulksms',
                'model' => 'BulkSMS'
            ],
            [
                'title' => 'Edit BulkSMS',
                'slug' => 'edit_bulksms',
                'model' => 'BulkSMS'
            ],
            [
                'title' => 'Destroy BulkSMS',
                'slug' => 'destory_bulksms',
                'model' => 'BulkSMS'
            ],
            [
                'title' => 'List Service',
                'slug' => 'list_services',
                'model' => 'Service'
            ],
            [
                'title' => 'Show Service',
                'slug' => 'show_services',
                'model' => 'Service'
            ],
            [
                'title' => 'Create Service',
                'slug' => 'create_services',
                'model' => 'Service'
            ],
            [
                'title' => 'Edit Service',
                'slug' => 'edit_services',
                'model' => 'Service'
            ],
            [
                'title' => 'Destroy Service',
                'slug' => 'destory_services',
                'model' => 'Service'
            ]
        ];

        foreach ($data as $key => $item) {
            Permission::create($item);
        }
    }
}
