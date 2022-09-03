<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Name" type="text" />

            <x-form-select name="gender" label="Gender" :options="Helper::getEnum('patients', 'gender')" placeholder="Please Select" />

            <x-form-input name="dob" label="Date of Birth" type="date" />
        @endwire
    </div>

    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-select name="blood_group" label="Blood Group" :options="Helper::getEnum('patients', 'blood_group')" placeholder="Please Select" />


            <x-form-input name="contact_no" label="Contact No." type="number" />

            <x-form-textarea name="description" label="About Patient" />
        @endwire
    </div>
</x-custom-form>
