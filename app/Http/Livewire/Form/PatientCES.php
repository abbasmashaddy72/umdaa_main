<?php

namespace App\Http\Livewire\Form;

use App\Models\Patient;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PatientCES extends Component
{
    // Model Values
    public $name, $locality_id, $gender, $blood_group, $dob, $contact_no, $description;

    // Custom Values
    public $data = null, $selectedLocalityId = null;

    // Listeners
    protected $listeners = ['locality_changed' => 'locality_changed'];

    // Listeners Function
    public function locality_changed($locality_id)
    {
        $this->selectedLocalityId = $locality_id;
    }

    protected $rules = [
        'name' => '',
        'locality_id' => '',
        'gender' => '',
        'blood_group' => '',
        'dob' => '',
        'contact_no' => '',
        'description' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'];

        Patient::create($validatedData);

        notify()->success('Patient Saved Successfully!');

        return $this->redirectRoute('patient.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'] ?? $this->data->locality_id;

        Patient::where('id', $this->data->id)->update($validatedData);

        notify()->success('Patient Updated Successfully!');

        return $this->redirectRoute('patient.index');
    }

    public function mount($data = null)
    {
        if (Helper::getRouteAction() != 'create' && $data != null) {
            $this->name = $data->name;
            $this->selectedLocalityId = $data->locality_id;
            $this->gender = $data->gender;
            $this->blood_group = $data->blood_group;
            $this->dob = $data->dob;
            $this->contact_no = $data->contact_no;
            $this->description = $data->description;
        }
    }

    public function render()
    {
        return view('livewire.form.patient-c-e-s');
    }
}
