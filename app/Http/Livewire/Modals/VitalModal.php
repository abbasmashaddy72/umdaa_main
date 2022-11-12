<?php

namespace App\Http\Livewire\Modals;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Vital;
use LivewireUI\Modal\ModalComponent;

class VitalModal extends ModalComponent
{
    // Set Data
    public $appointment_id;
    // Model Keys
    public $vital_id, $pulse_rate, $bp, $resp_rate, $temp, $spo2, $height, $weight, $bmi, $bsa, $waist, $hip, $wh_ratio;
    // Custom Keys
    public $name, $gender;

    public function mount()
    {
        if (!empty($this->appointment_id)) {
            $data = Vital::where('appointment_id', $this->appointment_id)->latest()->first();
            $this->vital_id = $data->id ?? '';
            $this->pulse_rate = $data->pulse_rate ?? '';
            $this->bp = $data->bp ?? '';
            $this->resp_rate = $data->resp_rate ?? '';
            $this->temp = $data->temp ?? '';
            $this->spo2 = $data->spo2 ?? '';
            $this->height = $data->height ?? '';
            $this->weight = $data->weight ?? '';
            $this->bmi = $data->bmi ?? '';
            $this->bsa = $data->bsa ?? '';
            $this->waist = $data->waist ?? '';
            $this->hip = $data->hip ?? '';
            $this->wh_ratio = $data->wh_ratio ?? '';
        }
        $appointment_data = Appointment::find($this->appointment_id);
        $patient_data = Patient::where('id', $appointment_data->patient_id)->first();
        $this->name = $patient_data->name;
        $this->gender = $patient_data->gender;
    }

    protected $rules = [
        'pulse_rate' => '',
        'bp' => '',
        'resp_rate' => '',
        'temp' => '',
        'spo2' => '',
        'height' => '',
        'weight' => '',
        'bmi' => '',
        'bsa' => '',
        'waist' => '',
        'hip' => '',
        'wh_ratio' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['appointment_id'] = $this->appointment_id;

        if (!empty($this->vital_id)) {
            Vital::findOrFail($this->vital_id)->update($validatedData);
        } else {
            Vital::create($validatedData);
        }

        notify()->success('Vitals Updated Successfully!');

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        if ($this->height == null || $this->weight == null) {
            $this->bmi = 0;
            $this->bsa = 0;
        } else {
            $this->bmi = round($this->weight / ($this->height / 100) ** 2, 2);
            $this->bsa = round(sqrt($this->height * $this->weight / 3600), 2);
        }
        if ($this->waist == null || $this->hip == null) {
            $this->wh_ratio = 0;
        } else {
            $this->wh_ratio = round($this->waist / $this->hip, 2);
        }

        return view('livewire.modals.vital-modal');
    }
}
