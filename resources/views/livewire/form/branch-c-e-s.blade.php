<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="house_no" label="House No." type="text" />

        <x-form-input name="landmark" label="Landmark" type="text" />
    @endwire

    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

    @wire('debounce.200ms')
        <x-form-input name="pin_code" label="Pin Code" type="number" />

        <x-form-input name="registration_fee" label="Registration Fee" type="number" />

        <x-form-textarea name="available_facilities" label="Available Facilities(, Separated)" />

        <x-form-input name="manager_name" label="Manager Name" type="text" />

        <x-form-input name="manager_contact_no" label="Manager Contact No." type="number" />

        <x-form-input name="manager_email" label="Manager Email" type="email" />
    @endwire
</x-custom-form>
