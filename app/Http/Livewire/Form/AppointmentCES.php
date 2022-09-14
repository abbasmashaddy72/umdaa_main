<?php

namespace App\Http\Livewire\Form;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Patient;
use App\Models\Procedure;
use App\Services\Helper;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentCES extends Component
{
    // Multi Step Form
    public $totalSteps = 3;
    public $step = 1;

    // Model Values 1st
    public $doctor_id, $patient_id, $referral_id, $date, $time;
    // Model Values 2nd
    public $procedure_id, $discount, $round_off, $mode_of_payment;
    // Model Values 3rd
    public $name, $locality_id, $gender, $blood_group, $dob, $contact_no, $description;

    // Custom Values 3rd
    public $selectedLocalityId = null, $age, $age_select, $options;

    // Listeners
    protected $listeners = ['locality_changed' => 'locality_changed'];

    //Custom Values
    public $data, $doctorRegistrationFee, $doctorConsultationFee, $procedureFee, $totalPayment, $appointment_dates = [], $day, $radio_patient_id, $working_days;

    // Listeners Function
    public function locality_changed($locality_id)
    {
        $this->selectedLocalityId = $locality_id;
    }

    public function updatedAgeSelect($data)
    {
        if ($data = 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($data = 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedAge($data)
    {
        if ($this->age_select = 'Years') {
            $this->dob = Carbon::now()->subYears($data)->format('Y-m-d');
        } elseif ($this->age_select = 'Months') {
            $this->dob = Carbon::now()->subMonths($data)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($data)->format('Y-m-d');
        }
    }

    public function updatedDob($date)
    {
        $data = Carbon::parse($this->dob)->diffForHumans();
        $data = str_replace(' ago', '', $data);
        $data = explode(' ', $data);
        $this->age = $data[0];
        if (substr($data[1], strlen($data[1]) - 1) == 's') {
            $this->age_select = ucwords($data[1]);
        } else {
            $this->age_select = ucwords($data[1]) . 's';
        }
    }

    public function updatedDoctorId($doctor)
    {
        $this->appointment_dates = DoctorSchedule::where('doctor_id', $this->doctor_id)->where('day', $this->day)->get();
        $this->working_days = DoctorSchedule::where('doctor_id', $this->doctor_id)->pluck('day')->toArray();
        // dd($this->working_days);
        $this->doctorRegistrationFee = Doctor::where('id', $doctor)->pluck('registration_fee');
        $this->doctorConsultationFee = Doctor::where('id', $doctor)->pluck('consultation_fee');
        $this->calculate();
    }

    public function updatedDate($date)
    {
        $this->day = Carbon::parse($date)->format('l');
        $this->appointment_dates = DoctorSchedule::where('doctor_id', $this->doctor_id)->where('day', $this->day)->get();
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
        $this->totalPayment = round($discountTotalPayment - $this->round_off ?? 0) ?? 0;
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
        'mode_of_payment' => '',
        // Patients
        'name' => '',
        'locality_id' => '',
        'gender' => '',
        'blood_group' => '',
        'dob' => '',
        'contact_no' => '',
        'description' => ''
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function moveAhead()
    {
        if ($this->step == 1) {
            $this->validateOnly('doctor_id');
            $this->validateOnly('date');
            $this->validateOnly('time');
        }

        if ($this->step == 2) {
            $this->validateOnly('patient_id');
            $this->validateOnly('referral_id');
            $this->validateOnly('procedure_id');
        }

        if ($this->step == 3) {
            $this->validateOnly('doctorRegistrationFee');
            $this->validateOnly('doctorConsultationFee');
            $this->validateOnly('procedureFee');
            $this->validateOnly('discount');
            $this->validateOnly('round_off');
            $this->validateOnly('totalPayment');
            $this->validateOnly('mode_of_payment');

            //Save
            $validatedData = $this->validate();
            $procedure = $validatedData['procedure_id'];
            $discount = $validatedData['discount'];
            $round_off = $validatedData['round_off'];
            $mode_of_payment = $validatedData['mode_of_payment'];
            unset($validatedData['procedure_id']);
            unset($validatedData['discount']);
            unset($validatedData['round_off']);
            unset($validatedData['mode_of_payment']);
            $validatedData['time'] = date("H:i:s", strtotime($validatedData['time']));
            $name = $validatedData['name'];
            $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'];
            $locality_id = $validatedData['locality_id'];
            $gender = $validatedData['gender'];
            $blood_group = $validatedData['blood_group'];
            $dob = $validatedData['dob'];
            $contact_no = $validatedData['contact_no'];
            $description = $validatedData['description'];
            unset($validatedData['name']);
            unset($validatedData['locality_id']);
            unset($validatedData['gender']);
            unset($validatedData['blood_group']);
            unset($validatedData['dob']);
            unset($validatedData['contact_no']);
            unset($validatedData['description']);

            $patient = Patient::create([
                'name' => $name,
                'locality_id' => $locality_id,
                'gender' => $gender,
                'blood_group' => $blood_group,
                'dob' => $dob,
                'contact_no' => $contact_no,
                'description' => $description,
            ]);

            $validatedData['patient_id'] = $patient->id;

            $appointment = Appointment::create($validatedData);

            Billing::create([
                'appointment_id' => $appointment->id,
                'procedure_id' => $procedure,
                'patient_id' => $patient->id,
                'discount' => $discount,
                'round_off' => $round_off,
                'mode_of_payment' => $mode_of_payment
            ]);

            //redirect
            notify()->success('Appointment Saved Successfully!');

            return $this->redirectRoute('appointment.index');
        }

        //Increase Step
        $this->step += 1;
        $this->_validateStep();
    }

    public function moveBack()
    {
        $this->step -= 1;
        $this->_validateStep();
    }

    private function _validateStep()
    {
        if ($this->step < 1) {
            $this->step = 1;
        }

        if ($this->step > $this->totalSteps) {
            $this->step = $this->totalSteps;
        }
    }

    // public function store()
    // {
    //     $validatedData = $this->validate();
    //     $procedure = $validatedData['procedure_id'];
    //     $discount = $validatedData['discount'];
    //     $round_off = $validatedData['round_off'];
    //     $mode_of_payment = $validatedData['mode_of_payment'];
    //     unset($validatedData['procedure_id']);
    //     unset($validatedData['discount']);
    //     unset($validatedData['round_off']);
    //     unset($validatedData['mode_of_payment']);
    //     $validatedData['time'] = date("H:i:s", strtotime($validatedData['time']));

    //     $appointment = Appointment::create($validatedData);
    //     Billing::create([
    //         'appointment_id' => $appointment->id,
    //         'procedure_id' => $procedure,
    //         'patient_id' => $this->patient_id,
    //         'discount' => $discount,
    //         'round_off' => $round_off,
    //         'mode_of_payment' => $mode_of_payment
    //     ]);

    //     notify()->success('Appointment Saved Successfully!');

    //     return $this->redirectRoute('appointment.index');
    // }

    // public function update()
    // {
    //     $validatedData = $this->validate();
    //     $procedure = $validatedData['procedure_id'];
    //     $discount = $validatedData['discount'];
    //     $round_off = $validatedData['round_off'];
    //     $mode_of_payment = $validatedData['mode_of_payment'];
    //     unset($validatedData['procedure_id']);
    //     unset($validatedData['discount']);
    //     unset($validatedData['round_off']);
    //     unset($validatedData['mode_of_payment']);
    //     $validatedData['time'] = date("H:i:s", strtotime($validatedData['time']));

    //     Appointment::where('id', $this->data->id)->update($validatedData);
    //     Billing::where('appointment_id', $this->data->id)->update([
    //         'procedure_id' => $procedure,
    //         'patient_id' => $this->patient_id,
    //         'discount' => $discount,
    //         'round_off' => $round_off,
    //         'mode_of_payment' => $mode_of_payment
    //     ]);

    //     notify()->success('Appointment Updated Successfully!');

    //     return $this->redirectRoute('appointment.index');
    // }

    public function mount($data)
    {
        if (Helper::getRouteAction() != 'create') {
            $this->doctor_id = $data->doctor_id;
            $this->patient_id = $data->patient_id;
            $this->referral_id = $data->referral_id;
            $this->date = $data->date;
            $this->day = Carbon::parse($this->date)->format('l');
            $this->time = $data->time;
            $this->working_days = DoctorSchedule::where('doctor_id', $this->doctor_id)->pluck('day')->toArray();
            $this->appointment_dates = DoctorSchedule::where('doctor_id', $this->doctor_id)->where('day', $this->day)->get();
        } else {
            $this->radio_patient_id = "New Patient";
            $this->date = date('Y-m-d');
            $this->day = Carbon::parse($this->date)->format('l');
        }
        $this->options = ['Select', 'Years', 'Months', 'Weeks', 'Days'];
    }

    public function render()
    {
        return view('livewire.form.appointment-c-e-s');
    }
}
