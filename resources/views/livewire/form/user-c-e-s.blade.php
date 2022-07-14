<x-custom-form>
    @wire('debounce.200ms')
        <x-form-select name="role" label="Role" :options="Helper::getKeyValues('Role', 'title', 'id')" placeholder="Please Select" />

        <x-form-input name="name" label="Name" type="text" />

        <x-form-input name="email" label="Email" type="email" />

        <x-form-input name="password" label="Password" type="password" />
    @endwire
</x-custom-form>
