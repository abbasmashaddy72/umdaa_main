<?php

namespace App\Http\Livewire\Form;

use App\Models\Appointment;
use App\Models\Billing;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Patient;
use App\Models\Procedure;
use App\Models\Vital;
use App\Services\Helper;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentCES extends Component
{
    // Model Values Appointment
    public $doctor_id, $patient_id, $referral_id, $date, $time, $appointment_status;
    // Model Values Billing
    public $procedure_id, $discount = 0, $round_off = 0, $mode_of_payment, $transaction_details, $registration_fee = 0, $consultation_fee = 0, $procedure_price = 0, $billing_status;
    // Model Values Patient
    public $name, $locality_id, $gender, $blood_group, $dob, $contact_no, $description;
    // Model Values Vital
    public $appointment_id, $pulse_rate, $bp, $resp_rate, $temp, $spo2, $height, $weight, $bmi, $bsa, $waist, $hip, $wh_ratio;

    // Custom Values 3rd
    public $selectedLocalityId = null, $age, $age_select, $options;
    //Custom Values
    public $data, $action, $doctorName, $totalPayment = 0, $appointment_dates = [], $day, $radio_patient_id, $working_days;

    // Listeners
    protected $listeners = ['locality_changed' => 'locality_changed'];

    // Listeners Function
    public function locality_changed($locality_id)
    {
        $this->selectedLocalityId = $locality_id;
    }

    public function updatedAgeSelect($selected_age)
    {
        if ($selected_age == 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($selected_age == 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } elseif ($selected_age == 'Weeks') {
            $this->dob = Carbon::now()->subWeeks($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedAge()
    {
        if ($this->age_select == 'Years') {
            $this->dob = Carbon::now()->subYears($this->age)->format('Y-m-d');
        } elseif ($this->age_select == 'Months') {
            $this->dob = Carbon::now()->subMonths($this->age)->format('Y-m-d');
        } elseif ($this->age_select == 'Weeks') {
            $this->dob = Carbon::now()->subWeeks($this->age)->format('Y-m-d');
        } else {
            $this->dob = Carbon::now()->subDays($this->age)->format('Y-m-d');
        }
    }

    public function updatedDob($date)
    {
        $data = Carbon::parse($date)->diffForHumans();
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
        $doctor_data = Doctor::where('id', $doctor)->first();
        $this->registration_fee = $doctor_data->registration_fee;
        $this->consultation_fee = $doctor_data->consultation_fee;
        $this->doctorName = $doctor_data->name;
    }

    public function updatedDate($date)
    {
        $this->day = Carbon::parse($date)->format('l');
        $this->appointment_dates = DoctorSchedule::where('doctor_id', $this->doctor_id)->where('day', $this->day)->get();
    }

    public function updatedProcedureId($procedure)
    {
        $this->procedure_price = Procedure::where('id', $procedure)->pluck('price');
    }

    protected $rules = [
        // Appointment
        'doctor_id' => '',
        'patient_id' => '',
        'referral_id' => '',
        'date' => '',
        'time' => '',
        'appointment_status' => '',
        // Billing
        'procedure_id' => '',
        'discount' => '',
        'round_off' => '',
        'mode_of_payment' => '',
        'transaction_details' => '',
        'registration_fee' => '',
        'consultation_fee' => '',
        'procedure_price' => '',
        'billing_status' => '',
        // Patients
        'name' => '',
        'locality_id' => '',
        'gender' => '',
        'blood_group' => '',
        'dob' => '',
        'contact_no' => '',
        'description' => '',
        // Vitals
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

    public function store()
    {
        $validatedData = $this->validate();
        $procedure = $validatedData['procedure_id'];
        $discount = $validatedData['discount'];
        $round_off = $validatedData['round_off'];
        $mode_of_payment = $validatedData['mode_of_payment'];
        $transaction_details = $validatedData['transaction_details'];
        $registration_fee = $validatedData['registration_fee'];
        $consultation_fee = $validatedData['consultation_fee'];
        $procedure_price = $validatedData['procedure_price'];
        $billing_status = $validatedData['billing_status'];
        unset($validatedData['registration_fee']);
        unset($validatedData['consultation_fee']);
        unset($validatedData['procedure_price']);
        unset($validatedData['procedure_id']);
        unset($validatedData['discount']);
        unset($validatedData['round_off']);
        unset($validatedData['mode_of_payment']);
        unset($validatedData['transaction_details']);
        unset($validatedData['billing_status']);
        $validatedData['time'] = date("H:i:s", strtotime($validatedData['time']));
        $name = $validatedData['name'];
        $validatedData['locality_id'] = $this->selectedLocalityId['locality_id'];
        $validatedData['branch_id'] = auth()->user()->branch_id;
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
            'branch_id' => $validatedData['branch_id']
        ]);

        $validatedData['patient_id'] = $patient->id;
        $validatedData['status'] = $validatedData['appointment_status'];
        unset($validatedData['appointment_status']);
        $validatedData['status'] = "Arrived";

        $appointment = Appointment::create($validatedData);

        Vital::create([
            'appointment_id' => $appointment->id,
            'pulse_rate' => $validatedData['pulse_rate'],
            'bp' => $validatedData['bp'],
            'resp_rate' => $validatedData['resp_rate'],
            'temp' => $validatedData['temp'],
            'spo2' => $validatedData['spo2'],
            'height' => $validatedData['height'],
            'weight' => $validatedData['weight'],
            'bmi' => $validatedData['bmi'],
            'bsa' => $validatedData['bsa'],
            'waist' => $validatedData['waist'],
            'hip' => $validatedData['hip'],
            'wh_ratio' => $validatedData['wh_ratio'],
        ]);

        Billing::create([
            'appointment_id' => $appointment->id,
            'procedure_id' => $procedure,
            'patient_id' => $patient->id,
            'discount' => $discount,
            'round_off' => $round_off,
            'mode_of_payment' => $mode_of_payment,
            'transaction_details' => $transaction_details,
            'registration_fee' => $registration_fee,
            'consultation_fee' => $consultation_fee,
            'procedure_price' => $procedure_price,
            'billing_status' => $billing_status,
        ]);

        notify()->success('Appointment Saved Successfully!');

        return $this->redirectRoute('appointment.index');
    }

    public function mount($data)
    {
        $this->action = Helper::getRouteAction();
        if ($this->action != 'create') {
            $this->doctor_id = $data->doctor_id;
            $this->patient_id = $data->patient_id;
            $this->referral_id = $data->referral_id;
            $this->appointment_id = $data->id;
            $this->radio_patient_id = "Old Patient";
            $this->date = $data->date;
            $this->appointment_status = $data->status;
            $this->day = Carbon::parse($this->date)->format('l');
            $this->time = Carbon::parse($data->time)->format('H:i A');
            $doctor_data = Doctor::where('id', $data->doctor_id)->first();
            $this->registration_fee = $doctor_data->registration_fee;
            $this->consultation_fee = $doctor_data->consultation_fee;
            $this->doctorName = $doctor_data->name;
            $vital_data = Vital::where('appointment_id', $data->id)->latest()->first();
            if (!empty($vital_data)) {
                $this->pulse_rate = $vital_data->pulse_rate;
                $this->bp = $vital_data->bp;
                $this->resp_rate = $vital_data->resp_rate;
                $this->temp = $vital_data->temp;
                $this->spo2 = $vital_data->spo2;
                $this->height = $vital_data->height;
                $this->weight = $vital_data->weight;
                $this->bmi = round($vital_data->weight / ($vital_data->height / 100) ** 2, 2);
                $this->bsa = round(sqrt($vital_data->height * $vital_data->weight / 3600), 2);
                $this->waist = $vital_data->waist;
                $this->hip = $vital_data->hip;
                $this->wh_ratio = round($vital_data->waist / $vital_data->hip, 2);
            }
            $billing_data = Billing::where('appointment_id', $data->id)->first();
            $this->procedure_price = $billing_data->procedure_id ?? 0;
            $this->discount = $billing_data->discount ?? 0;
            $this->round_off = $billing_data->round_off ?? 0;
            $this->mode_of_payment = $billing_data->mode_of_payment ?? "Cash";
            $this->transaction_details = $billing_data->transaction_details ?? "";
            $this->billing_status = $billing_data->billing_status ?? null;
            $patient_data = Patient::where('id', $data->patient_id)->first();
            $this->name = $patient_data->name;
            $this->locality_id = $patient_data->locality_id;
            $this->gender = $patient_data->gender;
            $this->blood_group = $patient_data->blood_group;
            $this->dob = $patient_data->dob;
            $this->contact_no = $patient_data->contact_no;
            $this->description = $patient_data->description;
            $this->branch_id = $patient_data->branch_id;
        } else {
            $this->radio_patient_id = "New Patient";
            $this->date = date('Y-m-d');
            $this->day = Carbon::parse($this->date)->format('l');
        }
        $this->options = ['Select', 'Years', 'Months', 'Weeks', 'Days'];
    }

    public function render()
    {
        if (Appointment::where('patient_id', $this->patient_id)->count() > 0 && $this->action != 'edit') {
            $this->registration_fee = 0;
            $addTotalPayment =  $this->registration_fee + $this->consultation_fee + @$this->procedure_price[0] ?: 0;
        } else {
            $addTotalPayment =  $this->registration_fee + $this->consultation_fee + @$this->procedure_price[0] ?: 0;
        }
        if (empty($this->discount)) {
            $discountTotalPayment = $addTotalPayment;
        } else {
            $discountTotalPayment = $addTotalPayment - (($addTotalPayment / 100) * $this->discount ?? 0);
        }
        if (empty($this->round_off)) {
            $this->totalPayment = round($discountTotalPayment);
        } else {
            $this->totalPayment = round($discountTotalPayment - $this->round_off ?? 0) ?? 0;
        }

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

        return view('livewire.form.appointment-c-e-s');
    }
}
