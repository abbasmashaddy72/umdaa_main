<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="name" label="Clinic Name" type="text" />

        <x-form-input name="contact_no" label="Contact No." type="number" />

        @if ($this->image != null)
            <img class="object-cover w-24 h-24 mt-5" src="{{ asset('storage/' . $this->image) }}" alt="{{ $this->name }}" />
        @endif

        <x-form-input name="image" label="Upload Image" type="file" />

        <x-form-input name="gst" label="GST Number(If Exists)" type="text" />
    @endwire
</x-custom-form>
