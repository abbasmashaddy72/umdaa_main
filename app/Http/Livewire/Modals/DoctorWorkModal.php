<?php

namespace App\Http\Livewire\Modals;

use App\Models\DoctorWork;
use LivewireUI\Modal\ModalComponent;

class DoctorWorkModal extends ModalComponent
{
    // Set Values
    public $doctor_work_id;
    // Model Values
    public $doctor_id, $where, $designation, $from, $to;

    public function mount()
    {
        if (!empty($this->doctor_work_id)) {
            $data = DoctorWork::findOrFail($this->doctor_work_id);
            $this->doctor_id = $data->doctor_id;
            $this->where = $data->where;
            $this->designation = $data->designation;
            $this->from = $data->from;
            $this->to = $data->to;
        }
    }

    protected $rules = [
        'where' => '',
        'designation' => '',
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

        if (!empty($this->doctor_work_id)) {
            DoctorWork::findOrFail($this->doctor_work_id)->update($validatedData);
        } else {
            DoctorWork::create($validatedData);
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.doctor-work-modal');
    }
}
