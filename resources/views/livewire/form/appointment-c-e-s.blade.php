<x-custom-form>
    @wire('debounce.200ms')
        <x-form-select name="patient_id" label="Select Patient" :options="['New Patient' => 'New Patient'] + Helper::getKeyValues('Patient', 'patient', 'id')->toArray()" placeholder="Please Select" />

        {{ $this->patient_id }}
        @if ($patient_id == 'New Patient')
            @livewire('form.patient-c-e-s', key(Str::random(10)))
        @endif

        <x-form-select name="doctor_id" label="Select Doctor" :options="Helper::getKeyValues('Doctor', 'doctor', 'id')" placeholder="Please Select" />

        <x-form-input name="date" label="Select Date" type="date" />

        <x-form-input name="time" label="Select Time" type="time" />

        @if (!empty($doctor_id))
            @foreach ($appointment_dates as $key => $value)
                <x-form-label label="{{ $value->day }}" />
                @foreach (Helper::getTimeSlots($value->from, $value->to, $value->appointment_duration) as $item)
                    <x-form-radio name="time" label="{{ $item }}" :wire:key="$loop->index" />
                @endforeach
            @endforeach
        @endif

        <x-form-select name="referral_id" label="Select Referral Doctor" :options="Helper::getKeyValues('Referral', 'doctor', 'id')" placeholder="Please Select" />
    @endwire
</x-custom-form>
