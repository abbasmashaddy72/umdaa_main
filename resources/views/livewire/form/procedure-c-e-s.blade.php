<x-custom-form>
    <div class="grid-cols-2 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Name" type="text" />

            <x-form-input name="price" label="Price" type="number" step=".01" />
        @endwire
    </div>
</x-custom-form>
