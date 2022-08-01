<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="name" label="Name" type="text" />

        <x-form-input name="price" label="Price" type="number" step=".01" />
    @endwire
</x-custom-form>
