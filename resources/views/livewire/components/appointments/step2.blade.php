<div class="grid-cols-2 gap-2 sm:grid">
    <div class="col-span-12 intro-y sm:col-span-1">
        <x-simple-select name="patient_id" id="patient_id" label="Select Patient" wire:model="patient_id" :options="[['id' => 'New Patient', 'patient' => 'New Patient']] +
            Helper::getKeyValues('Patient', 'patient', 'id')"
            value-field='id' text-field='patient' placeholder="Select Patient" search-input-placeholder="Search Patient"
            wire:click="calculate()" :searchable="true" />

        <x-simple-select name="referral_id" id="referral_id" label="Select Referral Doctor" wire:model="referral_id"
            :options="Helper::getKeyValuesWithMap('Referral', 'doctor', 'id')" value-field='id' text-field='doctor' placeholder="Select Referral Doctor"
            search-input-placeholder="Search Referral Doctor" :searchable="true" />

        <x-simple-select name="procedure_id" id="procedure_id" label="Select Procedure (If Any)"
            wire:model="procedure_id" :options="Helper::getKeyValuesWithMap('Procedure', 'name', 'id')" value-field='id' text-field='name'
            placeholder="Select Procedure" search-input-placeholder="Search Procedure" wire:click="calculate()"
            :searchable="true" />
    </div>

    @if ($this->patient_id == 'New Patient')
        <div class="col-span-12 intro-y sm:col-span-1">
            <div class="mt-2 shadow-md">
                @livewire('form.patient-c-e-s', key(Str::random(10)))
            </div>
        </div>
    @endif
</div>
