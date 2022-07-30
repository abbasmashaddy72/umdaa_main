<x-custom-form>
    @wire('debounce.200ms')
        <x-form-select name="patient_id" label="Select Patient" :options="['New Patient' => 'New Patient'] + Helper::getKeyValues('Patient', 'patient', 'id')->toArray()" placeholder="Please Select" />

        {{ $this->patient_id }}
        @if ($patient_id == 'New Patient')
            @livewire('form.patient-c-e-s', key(Str::random(10)))
        @endif

        <x-form-select name="doctor_id" wire:click="calculate()" label="Select Doctor" :options="Helper::getKeyValues('Doctor', 'doctor', 'id')"
            placeholder="Please Select" />

        <x-form-input name="date" label="Select Date" type="date" />

        <x-form-input name="time" label="Select Time" type="time" />

        @if (!empty($this->doctor_id))
            @foreach ($appointment_dates as $key => $value)
                <x-form-label label="{{ $value->day }}" />
                @foreach (Helper::getTimeSlots($value->from, $value->to, $value->appointment_duration) as $item)
                    <x-form-radio name="time" label="{{ $item }}" :wire:key="$loop->index" />
                @endforeach
            @endforeach
        @endif

        <x-form-select name="referral_id" label="Select Referral Doctor" :options="Helper::getKeyValues('Referral', 'doctor', 'id')" placeholder="Please Select" />

        <x-form-select name="procedure_id" wire:click="calculate()" label="Select Procedure (If Any)" :options="Helper::getKeyValues('Procedure', 'name', 'id')"
            placeholder="Please Select" />

        <x-form-label label="Amount Calculation" />

        <x-form-input name="doctorRegistrationFee" label="Doctor Registration Fee" type="number" disabled />

        <x-form-input name="doctorConsultationFee" label="Doctor Registration Fee" type="number" disabled />

        <x-form-input name="procedureFee" label="Procedure Fee" type="number" disabled />

        <x-form-input name="discount" wire:click="calculate()" label="Discount" type="number" />

        <x-form-input name="round_off" wire:click="calculate()" label="Round Off" type="number" />

        <x-form-input name="totalPayment" label="Total Payment" type="number" disabled />

        <x-form-select name="mode_of_payment" label="Select Mode of Payment" :options="Helper::getEnum('billings', 'mode_of_payment')"
            placeholder="Please Select" />
    @endwire
</x-custom-form>
