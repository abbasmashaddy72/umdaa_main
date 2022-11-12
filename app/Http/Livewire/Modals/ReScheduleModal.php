<?php

namespace App\Http\Livewire\Modals;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Patient;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class ReScheduleModal extends ModalComponent
{
    // Set Data
    public $appointment_id;
    // Custom Values
    public $doctor_id, $date, $time, $appointment_dates = [], $working_days, $doctorName;

    public function updatedDate($date)
    {
        $this->day = Carbon::parse($date)->format('l');
        $this->appointment_dates = DoctorSchedule::where('doctor_id', $this->doctor_id)->where('day', $this->day)->get();
    }

    protected $rules = [
        'appointment_id' => '',
        'doctor_id' => '',
        'date' => '',
        'time' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        unset($validatedData['appointment_id']);
        $validatedData['time'] = date("H:i:s", strtotime($validatedData['time']));
        $validatedData['status'] = "Re Scheduled";

        Appointment::where('id', $this->appointment_id)->update($validatedData);

        notify()->success('Re Scheduled Appointment Successfully!');

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '6xl';
    }

    public function mount()
    {
        if (!empty($this->appointment_id)) {
            $data = Appointment::find($this->appointment_id);
            $this->doctor_id = $data->doctor_id;
            $this->date = $data->date;
            $patient_data = Patient::where('id', $data->patient_id)->first();
            $this->name = $patient_data->name;
            $this->working_days = DoctorSchedule::where('doctor_id', $this->doctor_id)->pluck('day')->toArray();
            $doctor_data = Doctor::where('id', $this->doctor_id)->first();
            $this->doctorName = $doctor_data->name;
        }
    }

    public function render()
    {
        return view('livewire.modals.re-schedule-modal');
    }
}
