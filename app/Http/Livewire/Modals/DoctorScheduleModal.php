<?php

namespace App\Http\Livewire\Modals;

use App\Models\DoctorSchedule;
use LivewireUI\Modal\ModalComponent;

class DoctorScheduleModal extends ModalComponent
{
    // Set Values
    public $doctor_schedule_id;
    // Model Values
    public $doctor_id, $appointment_duration, $day, $from, $to;

    public function mount()
    {
        if (!empty($this->doctor_schedule_id)) {
            $data = DoctorSchedule::findOrFail($this->doctor_schedule_id);
            $this->doctor_id = $data->doctor_id;
            $this->appointment_duration = $data->appointment_duration;
            $this->day = $data->day;
            $this->from = $data->from;
            $this->to = $data->to;
        }
    }

    protected $rules = [
        'doctor_id' => '',
        'appointment_duration' => '',
        'day' => '',
        'from' => '',
        'to' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['doctor_id'] = $this->doctor_id;

        if (!empty($this->doctor_schedule_id)) {
            DoctorSchedule::findOrFail($this->doctor_schedule_id)->update($validatedData);
        } else {
            DoctorSchedule::create($validatedData);
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.doctor-schedule-modal');
    }
}
