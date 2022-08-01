<?php

namespace App\Http\Livewire\Form;

use App\Models\Department;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class DepartmentCES extends Component
{
    // Model Values
    public $name;
    // Custom Values
    public $data;

    protected $rules = [
        'name' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Department::create($validatedData);

        notify()->success('Department Saved Successfully!');

        return $this->redirectRoute('department.index');
    }

    public function update()
    {
        $validatedData = $this->validate();

        Department::where('id', $this->data->id)->update($validatedData);

        notify()->success('Department Updated Successfully!');

        return $this->redirectRoute('department.index');
    }

    public function mount($data = null)
    {
        if (Helper::getRouteAction() != 'create' && $data != null) {
            $this->name = $data->name;
        }
    }

    public function render()
    {
        return view('livewire.form.department-c-e-s');
    }
}
