<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Clinic Name" type="text" />

            <x-form-input name="contact_no" label="Contact No." type="number" />

            <x-form-input name="gst" label="GST Number(If Exists)" type="text" />

            @if ($this->image != null)
                <img class="object-cover w-24 h-24"
                    src="{{ $isUploaded ? $this->image->temporaryUrl() : asset('storage/' . $this->image) }}"
                    alt="{{ $this->name }}" />
            @endif

            <x-form-input name="image" label="Upload Image" type="file" />
        @endwire
    </div>
</x-custom-form>
