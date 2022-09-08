<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="house_no" label="House No." type="text" />

            <x-form-input name="landmark" label="Landmark" type="text" />

            <x-form-input name="pin_code" label="Pin Code" type="number" />
        @endwire
    </div>

    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="registration_fee" label="Registration Fee" type="number" />

            <x-form-input name="manager_name" label="Manager Name" type="text" />

            <x-form-input name="manager_contact_no" label="Manager Contact No." type="number" />

            <x-form-input name="manager_email" label="Manager Email" type="email" />

            <x-form-textarea name="available_facilities" label="Available Facilities(, Separated)" />
        @endwire
    </div>
</x-custom-form>
