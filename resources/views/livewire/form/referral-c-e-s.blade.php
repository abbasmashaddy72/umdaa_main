<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Name" type="text" />

            <x-form-input name="qualification" label="Qualification" type="text" />

            <x-simple-select name="department_id" id="department_id" label="Department" wire:model="department_id"
                :options="Helper::getKeyValuesWithMap('Department', 'name', 'id')" value-field='id' text-field='name' placeholder="Select Department"
                search-input-placeholder="Search Department" :searchable="true" />

            <x-form-input name="clinic_name" label="Clinic Name" type="text" />

            <x-form-input name="location" label="Location" type="text" />

            <x-form-input name="contact_no" label="Contact No." type="number" />

            <div></div>
            <div></div>
            <x-form-checkbox name="personal" label="Is Personal No." />
        @endwire
    </div>
</x-custom-form>
