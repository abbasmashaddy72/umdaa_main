<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AuthPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:permission {name} {--R|remove}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create auth permissions for a model';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Build permissions from name
     *
     * @return array
     */
    private function generatePermissions()
    {
        $abilities = ['list', 'show', 'create', 'edit', 'destroy'];
        $name = $this->getNameArgument();

        return array_map(function ($val) use ($name) {
            return $val . '_' . $name;
        }, $abilities);
    }

    /**
     * Get pluralized name argument
     *
     * @return string
     */
    private function getNameArgument()
    {
        return strtolower(Str::plural(($this->argument('name'))));
    }

    /**
     * Build permissions from name
     *
     * @return array
     */
    private function generateCapPermissions()
    {
        $abilities = ['List', 'Show', 'Create', 'Edit', 'Destroy'];
        $name = $this->argument('name');

        return array_map(function ($val) use ($name) {
            return $val . ' ' . $name;
        }, $abilities);
    }

    /**
     * Get pluralized name argument
     *
     * @return string
     */
    private function getCapNameArgument()
    {
        return strtolower(Str::plural(($this->argument('name'))));
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $permissions = $this->generatePermissions();
        $Cap_permissions = $this->generateCapPermissions();

        // check if its remove
        if ($is_remove = $this->option('remove')) {
            // remove permission
            if (Permission::where('title', 'LIKE', '%' . $this->argument('name'))->delete()) {
                $this->warn('Permissions ' . implode(', ', $permissions) . ' deleted.');
            } else {
                $this->warn('No permissions for ' . $this->argument('name') . ' found!');
            }
        } else {
            // create permissions
            foreach ($permissions as $index => $permission) {
                Permission::firstOrCreate(['title' => $Cap_permissions[$index], 'slug' => $permission, 'model' => $this->argument('name')]);
            }

            $this->info('Permissions ' . implode(', ', $permissions) . ' created.');
        }

        // sync role for admin
        if ($role = Role::where('title', 'Admin')->first()) {
            $role->permissions()->sync(Permission::all());

            $this->info('Admin permissions updated.');
        }
    }
}
