<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="name" label="Name" type="text" />
    @endwire
</x-custom-form>
