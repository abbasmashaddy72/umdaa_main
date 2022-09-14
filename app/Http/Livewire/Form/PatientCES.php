<?php

namespace App\Http\Livewire\Form;

use App\Models\Patient;
use App\Services\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class PatientCES extends Component
{
    // Model Values
    public $name, $locality_id, $gender, $blood_group, $dob, $contact_no, $description;

    // Custom Values
    public $data = null, $selectedLocalityId = null, $age, $age_select, $options;

    // Listeners
    protected $listeners = ['locality_changed' => 'locality_changed'];

    // Listeners Function
    public function locality_changed($locality_id)
    {
        $this->selectedLocalityId = $locality_id;
    }

    public function updatedAgeSelect($data)
    {
        if ($data = 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($data = 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedAge($data)
    {
        if ($this->age_select = 'Years') {
            $this->dob = Carbon::now()->subYears($data)->format('Y-m-d');
        } elseif ($this->age_select = 'Months') {
            $this->dob = Carbon::now()->subMonths($data)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($data)->format('Y-m-d');
        }
    }

    public function updatedDob($date)
    {
        $data = Carbon::parse($this->dob)->diffForHumans();
        $data = str_replace(' ago', '', $data);
        $data = explode(' ', $data);
        $this->age = $data[0];
        if (substr($data[1], strlen($data[1]) - 1) == 's') {
            $this->age_select = ucwords($data[1]);
        } else {
            $this->age_select = ucwords($data[1]) . 's';
        }
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
            $data = Carbon::parse($this->dob)->diffForHumans();
            $data = str_replace(' ago', '', $data);
            $data = explode(' ', $data);
            $this->age = $data[0];
            if (substr($data[1], strlen($data[1]) - 1) == 's') {
                $this->age_select = ucwords($data[1]);
            } else {
                $this->age_select = ucwords($data[1]) . 's';
            }
        }
        $this->options = ['Select', 'Years', 'Months', 'Weeks', 'Days'];
    }

    public function render()
    {
        return view('livewire.form.patient-c-e-s');
    }
}
