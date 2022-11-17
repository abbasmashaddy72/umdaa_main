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

    public function updatedAgeSelect($selected_age)
    {
        if ($selected_age == 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($selected_age == 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } elseif ($selected_age == 'Weeks') {
            $this->dob = Carbon::now()->subWeeks($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedAge()
    {
        if ($this->age_select == 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($this->age_select == 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } elseif ($this->age_select == 'Weeks') {
            $this->dob = Carbon::now()->subWeeks($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedDob($date)
    {
        $data = Carbon::parse($date)->diffForHumans();
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
        $validatedData['branch_id'] = auth()->user()->branch_id;

        Patient::create($validatedData);

        notify()->success('Patient Saved Successfully!');

        return $this->redirectRoute('patient.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'] ?? $this->data->locality_id;
        $validatedData['branch_id'] = auth()->user()->branch_id;

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
        $this->options = ['Years', 'Months', 'Weeks', 'Days'];
        $this->age_select = 'Years';
    }

    public function render()
    {
        return view('livewire.form.patient-c-e-s');
    }
}
