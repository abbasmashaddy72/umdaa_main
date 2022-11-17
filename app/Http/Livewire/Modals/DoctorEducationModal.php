<?php

namespace App\Http\Livewire\Modals;

use App\Models\DoctorEducation;
use LivewireUI\Modal\ModalComponent;

class DoctorEducationModal extends ModalComponent
{
    // Set Values
    public $doctor_education_id;
    // Model Values
    public $doctor_id, $title, $completed, $where;

    public function mount()
    {
        if (!empty($this->doctor_education_id)) {
            $data = DoctorEducation::findOrFail($this->doctor_education_id);
            $this->doctor_id = $data->doctor_id;
            $this->title = $data->title;
            $this->completed = $data->completed;
            $this->where = $data->where;
        }
    }

    protected $rules = [
        'doctor_id' => '',
        'title' => '',
        'completed' => '',
        'where' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['doctor_id'] = $this->doctor_id;

        if (!empty($this->doctor_education_id)) {
            DoctorEducation::findOrFail($this->doctor_education_id)->update($validatedData);
        } else {
            DoctorEducation::create($validatedData);
        }

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.doctor-education-modal');
    }
}
