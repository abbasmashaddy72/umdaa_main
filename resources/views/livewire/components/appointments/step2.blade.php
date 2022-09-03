<div class="grid-cols-2 gap-2 sm:grid">
    <div class="col-span-12 intro-y sm:col-span-1">
        <x-form-select name="patient_id" label="Select Patient" :options="['New Patient' => 'New Patient'] + Helper::getKeyValues('Patient', 'patient', 'id')->toArray()" placeholder="Please Select" />

        <x-form-select name="referral_id" label="Select Referral Doctor" :options="Helper::getKeyValues('Referral', 'doctor', 'id')" placeholder="Please Select" />

        <x-form-select name="procedure_id" wire:click="calculate()" label="Select Procedure (If Any)" :options="Helper::getKeyValues('Procedure', 'name', 'id')"
            placeholder="Please Select" />
    </div>

    @if ($this->patient_id == 'New Patient')
        <div class="col-span-12 intro-y sm:col-span-1">
            <div class="mt-2 shadow-md">
                @livewire('form.patient-c-e-s', key(Str::random(10)))
            </div>
        </div>
    @endif
</div>
