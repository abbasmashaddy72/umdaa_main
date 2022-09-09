<div class="grid-cols-2 gap-2 sm:grid">
    <div class="col-span-12 intro-y sm:col-span-1">

        <div class="mt-3">
            <label>{{ __('Select Patient') }}</label>
            <div class="flex flex-col mt-2 sm:flex-row">
                <div class="mr-2 form-check">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="radio_patient_id" name="radio_patient_id" value="New Patient"
                            class="form-check-input">
                        <span class="ml-2 form-check-label">{{ __('New Patient') }}</span>
                    </label>
                </div>
                <div class="mt-2 mr-2 form-check sm:mt-0">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="radio_patient_id" name="radio_patient_id" value="Old Patient"
                            class="form-check-input" checked>
                        <span class="ml-2 form-check-label">{{ __('Old Patient') }}</span>
                    </label>
                </div>
            </div>
        </div>

        @if ($radio_patient_id == 'Old Patient')
            <x-simple-select name="patient_id" id="patient_id" label="Select Patient" wire:model="patient_id"
                :options="Helper::getKeyValuesWithMap('Patient', 'patient', 'id')" value-field='id' text-field='patient' placeholder="Select Patient"
                search-input-placeholder="Search Patient" wire:click="calculate()" :searchable="true" />
        @endif

        <x-simple-select name="referral_id" id="referral_id" label="Select Referral Doctor" wire:model="referral_id"
            :options="Helper::getKeyValuesWithMap('Referral', 'doctor', 'id')" value-field='id' text-field='doctor' placeholder="Select Referral Doctor"
            search-input-placeholder="Search Referral Doctor" :searchable="true" />

        <x-simple-select name="procedure_id" id="procedure_id" label="Select Procedure (If Any)"
            wire:model="procedure_id" :options="Helper::getKeyValuesWithMap('Procedure', 'name', 'id')" value-field='id' text-field='name'
            placeholder="Select Procedure" search-input-placeholder="Search Procedure" wire:click="calculate()"
            :searchable="true" />
    </div>

    @if ($this->radio_patient_id == 'New Patient')
        <div class="col-span-12 intro-y sm:col-span-1">
            <div class="mt-2 shadow-md">
                @livewire('form.patient-c-e-s', key(Str::random(10)))
            </div>
        </div>
    @endif
</div>
