<?php

namespace App\Http\Livewire\Form;

use App\Models\Branch;
use App\Services\Helper;
use Livewire\Component;

class BranchCES extends Component
{
    // Model Values
    public $house_no, $landmark, $locality_id, $pin_code, $registration_fee, $available_facilities, $manager_name, $manager_contact_no, $manager_email;

    // Custom Values
    public $data, $selectedLocalityId = null;

    // Listeners
    protected $listeners = ['locality_changed' => 'locality_changed'];

    // Listeners Function
    public function locality_changed($locality_id)
    {
        $this->selectedLocalityId = $locality_id;
    }

    protected $rules = [
        'house_no' => '',
        'landmark' => '',
        'locality_id' => '',
        'pin_code' => '',
        'registration_fee' => '',
        'available_facilities' => '',
        'manager_name' => '',
        'manager_contact_no' => '',
        'manager_email' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'];

        Branch::create($validatedData);

        notify()->success('Branch Saved Successfully!');

        return $this->redirectRoute('branch.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'] ?? $this->data->locality_id;

        Branch::where('id', $this->data->id)->update($validatedData);

        notify()->success('Branch Updated Successfully!');

        return $this->redirectRoute('branch.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->house_no = $data->house_no;
            $this->landmark = $data->landmark;
            $this->selectedLocalityId = $data->locality_id;
            $this->pin_code = $data->pin_code;
            $this->registration_fee = $data->registration_fee;
            $this->available_facilities = $data->available_facilities;
            $this->manager_name = $data->manager_name;
            $this->manager_contact_no = $data->manager_contact_no;
            $this->manager_email = $data->manager_email;
        }
    }

    public function render()
    {
        return view('livewire.form.branch-c-e-s');
    }
}
