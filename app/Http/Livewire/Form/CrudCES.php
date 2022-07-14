<?php

namespace App\Http\Livewire\Form;

use App\Models\Role;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class CrudCES extends Component
{
    // Model Values
    public $title;

    // Custom Values
    public $data, $permissions = [];

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

        Role::find($role->id)->permissions()->attach($validatedData['permissions']);

        notify()->success('Role Saved Successfully!');

        return $this->redirectRoute('crud.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $permissions = array_keys(array_filter($validatedData['permissions']));

        unset($validatedData['permissions']);
        Role::where('id', $this->data->id)->update($validatedData);

        Role::find($this->data->id)->permissions()->sync($permissions);

        notify()->success('Role Updated Successfully!');

        return $this->redirectRoute('crud.index');
    }

    public function mount($data)
    {
        if (substr(strstr(Route::currentRouteAction(), '@'), 1) != 'create') {
            $this->title = $data->title;
        }
        // Checked list Pending
        // $this->checked  = array_keys(Helper::getKeyValues('PermissionRole', 'permission_id', 'permission_id', 'role_id', $this->data->id)->toArray());
        $this->permissions = Helper::getKeyValues('permission', 'title', 'id');
    }

    public function render()
    {
        return view('livewire.form.crud-c-e-s');
    }
}
