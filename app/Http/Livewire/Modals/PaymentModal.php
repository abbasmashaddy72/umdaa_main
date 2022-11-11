<?php

namespace App\Http\Livewire\Modals;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Patient;
use LivewireUI\Modal\ModalComponent;

class PaymentModal extends ModalComponent
{
    // Set Data
    public $appointment_id;
    // Model Keys
    public $procedure_id, $patient_id, $discount, $round_off, $mode_of_payment, $branch_id, $transaction_details;
    // Custom Keys
    public $name;

    public function mount()
    {
        if (!empty($this->appointment_id)) {
            $data = Billing::where('appointment_id', $this->appointment_id)->latest()->first();
            $this->vital_id = $data->id;
            $this->pulse_rate = $data->pulse_rate;
            $this->bp = $data->bp;
            $this->resp_rate = $data->resp_rate;
            $this->temp = $data->temp;
            $this->spo2 = $data->spo2;
            $this->height = $data->height;
            $this->weight = $data->weight;
            $this->bmi = $data->bmi;
            $this->bsa = $data->bsa;
            $this->waist = $data->waist;
            $this->hip = $data->hip;
            $this->wh_ratio = $data->wh_ratio;
        }
        $appointment_data = Appointment::find($this->appointment_id);
        $patient_data = Patient::where('id', $appointment_data->patient_id)->first();
        $this->name = $patient_data->name;
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

        if (!empty($this->vital_id)) {
            Billing::findOrFail($this->vital_id)->update($validatedData);
        } else {
            Billing::create($validatedData);
        }

        notify()->success('Vitals Updated Successfully!');

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }
    public function render()
    {
        return view('livewire.modals.payment-modal');
    }
}
