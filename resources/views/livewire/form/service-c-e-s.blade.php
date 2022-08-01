<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="name" label="Name" type="text" />

        <x-form-textarea name="excerpt" label="Excerpt" />

        @if ($this->image != null)
            <img class="object-cover w-24 h-24 mt-5" src="{{ $this->image }}" alt="{{ $this->name }}" />
        @endif

        <x-form-input name="image" label="Upload Image" type="file" />

        <x-form-select name="department_id" label="Select Department" :options="Helper::getKeyValues('Department', 'name', 'id')" placeholder="Please Select" />
    @endwire
</x-custom-form>
