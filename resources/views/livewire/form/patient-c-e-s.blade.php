<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Name" type="text" />

            <x-simple-select name="gender" id="gender" label="Gender" wire:model="gender" :options="Helper::getEnum('patients', 'gender')"
                placeholder="Please Select" search-input-placeholder="Search Gender" :searchable="true" />

            <x-form-input name="dob" label="Date of Birth" type="date" />
        @endwire
    </div>

    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-simple-select name="blood_group" id="blood_group" label="Blood Group" wire:model="blood_group"
                :options="Helper::getEnum('patients', 'blood_group')" placeholder="Please Select" search-input-placeholder="Search Blood Group"
                :searchable="true" />

            <x-form-input name="contact_no" label="Contact No." type="number" />

            <x-form-textarea name="description" label="About Patient" />
        @endwire
    </div>
</x-custom-form>
