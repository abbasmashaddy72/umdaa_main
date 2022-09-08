<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Name" type="text" />

            <x-form-input name="email" label="Email" type="email" />

            <x-simple-select name="gender" id="gender" label="Gender" wire:model="gender" :options="Helper::getEnum('patients', 'gender')"
                placeholder="Please Select" search-input-placeholder="Search Gender" :searchable="true" />
        @endwire
    </div>

    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="dob" label="Date of Birth" type="date" />

            <x-form-input name="contact_no" label="Contact No." type="number" />

            <x-form-input name="qualification" label="Qualification" type="text" />

            <x-form-input name="registration_no" label="Registration No." type="text" />

            <x-simple-select name="department_id" id="department_id" label="Department" wire:model="department_id"
                :options="Helper::getKeyValuesWithMap('Department', 'name', 'id')" value-field='id' text-field='name' placeholder="Select Department"
                search-input-placeholder="Search Department" :searchable="true" />

            <x-form-input name="registration_fee" label="Registration Fee" type="number" />

            <x-form-input name="consultation_fee" label="Consultation Fee" type="number" />

            <x-form-input name="review_link" label="Review Link" type="number" />

            <x-form-input name="career_start_date" label="Career Start Date" type="date" />

            <x-form-textarea name="about" label="About" />
        @endwire
    </div>
</x-custom-form>
