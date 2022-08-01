<?php

namespace App\Http\Livewire\Form;

use App\Models\Procedure;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ProcedureCES extends Component
{
    // Model Values
    public $name, $price;

    // Custom Values
    public $data;

    protected $rules = [
        'name' => '',
        'price' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Procedure::create($validatedData);

        notify()->success('Procedure Saved Successfully!');

        return $this->redirectRoute('procedure.index');
    }

    public function update()
    {
        $validatedData = $this->validate();

        Procedure::where('id', $this->data->id)->update($validatedData);

        notify()->success('Procedure Updated Successfully!');

        return $this->redirectRoute('procedure.index');
    }

    public function mount($data = null)
    {
        if (Helper::getRouteAction() != 'create' && $data != null) {
            $this->name = $data->name;
            $this->price = $data->price;
        }
    }

    public function render()
    {
        return view('livewire.form.procedure-c-e-s');
    }
}
