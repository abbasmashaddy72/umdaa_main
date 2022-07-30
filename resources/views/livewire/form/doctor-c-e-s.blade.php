<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="name" label="Name" type="text" />

        <x-form-input name="email" label="Email" type="email" />
    @endwire

    @livewire('components.state-city-locality', ['selectedLocality' => $selectedLocalityId])

    @wire('debounce.200ms')
        <x-form-select name="gender" label="Gender" :options="Helper::getEnum('patients', 'gender')" placeholder="Please Select" />

        <x-form-input name="dob" label="Date of Birth" type="date" />

        <x-form-input name="contact_no" label="Contact No." type="number" />

        <x-form-input name="qualification" label="Qualification" type="text" />

        <x-form-input name="registration_no" label="Registration No." type="text" />

        <x-form-select name="department_id" label="Select Department" :options="Helper::getKeyValues('Department', 'name', 'id')" placeholder="Please Select" />

        <x-form-input name="registration_fee" label="Registration Fee" type="number" />

        <x-form-input name="consultation_fee" label="Consultation Fee" type="number" />

        <x-form-input name="review_link" label="Review Link" type="number" />

        <x-form-textarea name="about" label="About" />

        <x-form-input name="career_start_date" label="Career Start Date" type="date" />
    @endwire
</x-custom-form>
