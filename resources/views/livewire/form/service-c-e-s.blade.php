<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="name" label="Name" type="text" />

            @if ($this->image != null)
                <img class="object-cover w-24 h-24 mt-5"
                    src="{{ $isUploaded ? $this->image->temporaryUrl() : asset('storage/' . $this->image) }}"
                    alt="{{ $this->name }}" />
            @endif

            <x-form-input name="image" label="Upload Image" type="file" />

            <x-form-textarea name="excerpt" label="Excerpt" />

            <x-simple-select name="department_id" id="department_id" label="Department" wire:model="department_id"
                :options="Helper::getKeyValuesWithMap('Department', 'name', 'id')" value-field='id' text-field='name' placeholder="Select Department"
                search-input-placeholder="Search Department" :searchable="true" />
        @endwire
    </div>
</x-custom-form>
