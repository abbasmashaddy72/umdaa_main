<?php

namespace App\Http\Livewire\Form;

use App\Models\Service;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceCES extends Component
{
    use WithFileUploads;

    // Model Values
    public $department_id, $name, $excerpt, $image;

    // Custom Values
    public $data;

    protected $rules = [
        'department_id' => '',
        'name' => '',
        'excerpt' => '',
        'image' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Service::create($validatedData);

        notify()->success('Service Saved Successfully!');

        return $this->redirectRoute('service.index');
    }

    public function update()
    {
        $validatedData = $this->validate();

        Service::where('id', $this->data->id)->update($validatedData);

        notify()->success('Service Updated Successfully!');

        return $this->redirectRoute('service.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->department_id = $data->department_id;
            $this->name = $data->name;
            $this->excerpt = $data->excerpt;
            $this->image = $data->image;
        }
    }

    public function render()
    {
        return view('livewire.form.service-c-e-s');
    }
}
