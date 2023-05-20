<?php

namespace App\Http\Livewire\Form;

use App\Models\Role;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class RoleCES extends Component
{
    // Model Values
    public $title;

    // Custom Values
    public $data, $checked = [], $permissions = [];

    protected $rules = [
        'title' => '',
        'permissions' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['permissions'] = array_keys(array_filter($validatedData['permissions']));

        unset($validatedData['permissions']);
        $role = Role::create($validatedData);

        Role::find($role->id)->permissions()->attach($role);

        notify()->success('Role Saved Successfully!');

        return $this->redirectRoute('role.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $permissions = array_keys(array_filter($validatedData['permissions']));

        unset($validatedData['permissions']);
        Role::where('id', $this->data->id)->update($validatedData);

        Role::find($this->data->id)->permissions()->sync($permissions);

        notify()->success('Role Updated Successfully!');

        return $this->redirectRoute('role.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->title = $data->title;
            $this->checked  = array_keys(Helper::getKeyValues('PermissionRole', 'permission_id', 'permission_id', 'role_id', $this->data->id)->toArray());
        }
        // Checked list Pending
        $this->permissions = Helper::getKeyValues('permission', 'title', 'id');
    }

    public function render()
    {
        return view('livewire.form.role-c-e-s');
    }
}
