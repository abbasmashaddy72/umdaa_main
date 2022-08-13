<?php

namespace App\Http\Livewire\Form;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Procedure;
use App\Services\Helper;
use Livewire\Component;

class AppointmentCES extends Component
{
    // Model Values 1st
    public $doctor_id, $patient_id, $referral_id, $date, $time;
    // Model Values 2nd
    public $procedure_id, $discount, $round_off, $mode_of_payment;

    //Custom Values
    public $data, $doctorRegistrationFee, $doctorConsultationFee, $procedureFee, $totalPayment, $appointment_dates = [];

    public function updatedDoctorId($doctor)
    {
        $this->appointment_dates = DoctorSchedule::where('doctor_id', $doctor)->get();
        $this->doctorRegistrationFee = Doctor::where('id', $doctor)->pluck('registration_fee');
        $this->doctorConsultationFee = Doctor::where('id', $doctor)->pluck('consultation_fee');
        $this->calculate();
    }

    public function updatedProcedureId($procedure)
    {
        $this->procedureFee = Procedure::where('id', $procedure)->pluck('price');
        $this->calculate();
    }

    public function calculate()
    {
        if (Appointment::where('patient_id', $this->patient_id)->count() > 0) {
            $this->doctorRegistrationFee = 0;
            $addTotalPayment =  $this->doctorRegistrationFee + $this->doctorConsultationFee[0] + @$this->procedureFee[0] ?: 0;
        } else {
            $addTotalPayment =  $this->doctorRegistrationFee[0] + $this->doctorConsultationFee[0] + @$this->procedureFee[0] ?: 0;
        }
        $discountTotalPayment = $addTotalPayment - (($addTotalPayment / 100) * $this->discount ?? 0);
        $this->totalPayment = $discountTotalPayment - $this->round_off ?? 0;
    }

    protected $rules = [
        'doctor_id' => '',
        'patient_id' => '',
        'referral_id' => '',
        'date' => '',
        'time' => '',
        'procedure_id' => '',
        'discount' => '',
        'round_off' => '',
        'mode_of_payment' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();
        $procedure = $validatedData['procedure_id'];
        $discount = $validatedData['discount'];
        $round_off = $validatedData['round_off'];
        $mode_of_payment = $validatedData['mode_of_payment'];
        unset($validatedData['procedure_id']);
        unset($validatedData['discount']);
        unset($validatedData['round_off']);
        unset($validatedData['mode_of_payment']);
        $validatedData['time'] = date("H:i:s", strtotime(array_values($validatedData['time'])[0]));

        $appointment = Appointment::create($validatedData);
        Billing::create([
            'appointment_id' => $appointment->id,
            'procedure_id' => $procedure,
            'patient_id' => $this->patient_id,
            'discount' => $discount,
            'round_off' => $round_off,
            'mode_of_payment' => $mode_of_payment
        ]);

        notify()->success('Appointment Saved Successfully!');

        return $this->redirectRoute('appointment.index');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $procedure = $validatedData['procedure_id'];
        $discount = $validatedData['discount'];
        $round_off = $validatedData['round_off'];
        $mode_of_payment = $validatedData['mode_of_payment'];
        unset($validatedData['procedure_id']);
        unset($validatedData['discount']);
        unset($validatedData['round_off']);
        unset($validatedData['mode_of_payment']);
        $validatedData['time'] = date("H:i:s", strtotime(array_values($validatedData['time'])[0]));

        Appointment::where('id', $this->data->id)->update($validatedData);
        Billing::where('appointment_id', $this->data->id)->update([
            'procedure_id' => $procedure,
            'patient_id' => $this->patient_id,
            'discount' => $discount,
            'round_off' => $round_off,
            'mode_of_payment' => $mode_of_payment
        ]);

        notify()->success('Appointment Updated Successfully!');

        return $this->redirectRoute('appointment.index');
    }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
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
