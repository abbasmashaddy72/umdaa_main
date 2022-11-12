<?php

namespace App\Http\Livewire\Modals;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Patient;
use App\Models\Procedure;
use LivewireUI\Modal\ModalComponent;

class PaymentModal extends ModalComponent
{
    // Set Data
    public $appointment_id;
    // Model Keys
    public $procedure_id, $patient_id, $discount = 0, $round_off = 0, $mode_of_payment, $branch_id, $transaction_details, $registration_fee = 0, $consultation_fee = 0, $procedure_price = 0;
    // Custom Keys
    public $name;

    public function updatedProcedureId($procedure)
    {
        $this->procedure_price = Procedure::where('id', $procedure)->value('price');
    }

    public function mount()
    {
        if (!empty($this->appointment_id)) {
            $data = Billing::where('appointment_id', $this->appointment_id)->latest()->first();
            $this->procedure_id = $data->procedure_id ?? '';
            $this->patient_id = $data->patient_id ?? '';
            $this->discount = $data->discount ?? 0;
            $this->round_off = $data->round_off ?? 0;
            $this->mode_of_payment = $data->mode_of_payment ?? '';
            $this->branch_id = $data->branch_id ?? '';
            $this->transaction_details = $data->transaction_details ?? '';
            $this->registration_fee = $data->registration_fee ?? 0;
            $this->consultation_fee = $data->consultation_fee ?? 0;
            $this->procedure_price = $data->procedure_price ?? 0;
        }
        $appointment_data = Appointment::find($this->appointment_id);
        $patient_data = Patient::where('id', $appointment_data->patient_id)->first();
        $this->name = $patient_data->name;
    }

    protected $rules = [
        'appointment_id' => '',
        'procedure_id' => '',
        'patient_id' => '',
        'discount' => '',
        'round_off' => '',
        'mode_of_payment' => '',
        'branch_id' => '',
        'transaction_details' => '',
        'registration_fee' => '',
        'consultation_fee' => '',
        'procedure_price' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();
        $validatedData['appointment_id'] = $this->appointment_id;
        $validatedData['status'] = 1;

        Billing::where('appointment_id', $this->appointment_id)->updateOrCreate($validatedData);

        notify()->success('Payment Updated Successfully!');

        $this->emit('refreshLivewireDatatable');

        $this->closeModal();
    }
    public function render()
    {
        $addTotalPayment =  $this->registration_fee + $this->consultation_fee +  @$this->procedure_price ?: 0;

        if (empty($this->discount)) {
            $discountTotalPayment = $addTotalPayment;
        } else {
            $discountTotalPayment = $addTotalPayment - (($addTotalPayment / 100) * $this->discount ?? 0);
        }
        if (empty($this->round_off)) {
            $this->totalPayment = round((int)$discountTotalPayment);
        } else {
            $this->totalPayment = round($discountTotalPayment - $this->round_off ?? 0) ?? 0;
        }

        return view('livewire.modals.payment-modal');
    }
}
