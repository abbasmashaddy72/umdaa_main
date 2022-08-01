<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="name" label="Name" type="text" />

        <x-form-input name="qualification" label="Qualification" type="text" />

        <x-form-select name="department_id" label="Select Department" :options="Helper::getKeyValues('Department', 'name', 'id')" placeholder="Please Select" />

        <x-form-input name="contact_no" label="Contact No." type="number" />
        <x-form-checkbox name="personal" label="Is Personal No." />

        <x-form-input name="clinic_name" label="Clinic Name" type="text" />

        <x-form-input name="location" label="Location" type="text" />
    @endwire
</x-custom-form>
