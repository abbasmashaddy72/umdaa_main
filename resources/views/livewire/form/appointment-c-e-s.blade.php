<x-custom-form>
    @wire('debounce.200ms')
        <x-form-select name="patient_id" label="Select Patient" :options="['New Patient' => 'New Patient'] + Helper::getKeyValues('Patient', 'patient', 'id')->toArray()" placeholder="Please Select" />

        <div class="mt-2 shadow-md">
            @if ($this->patient_id == 'New Patient')
                @livewire('form.patient-c-e-s', key(Str::random(10)))
            @endif
        </div>

        <x-form-select name="doctor_id" wire:click="calculate()" label="Select Doctor" :options="Helper::getKeyValues('Doctor', 'doctor', 'id')"
            placeholder="Please Select" />

        <x-form-input name="date" label="Select Date" type="date" />

        @if (!empty($this->doctor_id))
            @foreach ($appointment_dates as $key => $value)
                <x-form-label label="{{ $value->day }}" />
                <div class="grid grid-cols-12 gap-4 mt-5 gap-y-5">
                    @foreach (Helper::getTimeSlots($value->from, $value->to, $value->appointment_duration) as $item)
                        <div class="col-span-12 intro-y sm:col-span-2">
                            <label class="inline-flex items-center">
                                <input wire:key="5" type="radio" wire:model="time.{{ $item }}"
                                    name="time.{{ $item }}" value="{{ $item }}">
                                <span class="ml-2">{{ $item }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
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

        <x-form-input name="round_off" wire:click="calculate()" label="Round Off" type="number" step=".01" />

        <x-form-input name="totalPayment" label="Total Payment" type="number" disabled />

        <x-form-select name="mode_of_payment" label="Select Mode of Payment" :options="Helper::getEnum('billings', 'mode_of_payment')"
            placeholder="Please Select" />
    @endwire
</x-custom-form>
