<?php

namespace App\Http\Livewire\Form;

use App\Models\Appointment;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AppointmentCES extends Component
{
    // Model Values
    public $doctor_id, $patient_id, $referral_id, $date, $time;

    //Custom Values
    public $data, $appointment_dates = [];

    public function updatedDoctorId($doctor)
    {
        $this->appointment_dates = DoctorSchedule::where('doctor_id', $doctor)->get();
        $this->emitSelf('refreshComponent');
    }

    protected $rules = [
        'doctor_id' => '',
        'patient_id' => '',
        'referral_id' => '',
        'date' => '',
        'time' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        Appointment::create($validatedData);

        notify()->success('Appointment Saved Successfully!');

        return $this->redirectRoute('appointment.index');
    }

    public function update()
    {
        $validatedData = $this->validate();

        Appointment::where('id', $this->data->id)->update($validatedData);

        notify()->success('Appointment Updated Successfully!');

        return $this->redirectRoute('appointment.index');
    }

    public function mount($data)
    {
        if (substr(strstr(Route::currentRouteAction(), '@'), 1) != 'create') {
            $this->doctor_id = $data->doctor_id;
            $this->patient_id = $data->patient_id;
            $this->referral_id = $data->referral_id;
            $this->date = $data->date;
            $this->time = $data->time;
        }
    }

    public function render()
    {
        return view('livewire.form.appointment-c-e-s');
    }
}
