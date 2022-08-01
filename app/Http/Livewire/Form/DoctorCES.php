<?php

namespace App\Http\Livewire\Form;

use App\Models\Doctor;
use App\Services\Helper;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class DoctorCES extends Component
{
    // Model Values
    public $name, $email, $locality_id, $gender, $dob, $contact_no, $qualification, $registration_no, $department_id, $registration_fee, $consultation_fee, $review_link, $about, $career_start_date;

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
        'name' => '',
        'email' => '',
        'locality_id' => '',
        'gender' => '',
        'dob' => '',
        'contact_no' => '',
        'qualification' => '',
        'registration_no' => '',
        'department_id' => '',
        'registration_fee' => '',
        'consultation_fee' => '',
        'review_link' => '',
        'about' => '',
        'career_start_date' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'];

        Doctor::create($validatedData);

        notify()->success('Doctor Saved Successfully!');

        return $this->redirectRoute('doctor.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'] ?? $this->data->locality_id;

        Doctor::where('id', $this->data->id)->update($validatedData);

        notify()->success('Doctor Updated Successfully!');

        return $this->redirectRoute('doctor.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->name = $data->name;
            $this->email = $data->email;
            $this->selectedLocalityId = $data->locality_id;
            $this->gender = $data->gender;
            $this->dob = $data->dob;
            $this->contact_no = $data->contact_no;
            $this->qualification = $data->qualification;
            $this->registration_no = $data->registration_no;
            $this->department_id = $data->department_id;
            $this->registration_fee = $data->registration_fee;
            $this->consultation_fee = $data->consultation_fee;
            $this->review_link = $data->review_link;
            $this->about = $data->about;
            $this->career_start_date = $data->career_start_date;
        }
    }

    public function render()
    {
        return view('livewire.form.doctor-c-e-s');
    }
}
