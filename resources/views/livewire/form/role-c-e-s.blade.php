<x-custom-form>
    <div class="grid-cols-3 gap-2 sm:grid">
        @wire('debounce.200ms')
            <x-form-input name="title" label="Role Title" type="text" />

            <div class="col-span-2 mt-5">
                <x-form-label label="Permissions List" />
                <div class="grid-cols-3 gap-2 sm:grid">
                    @foreach ($permissions as $key => $value)
                        <x-form-checkbox name="permissions.{{ $key }}" label="{{ $value }}"
                            value="{{ $key }}" :checked="in_array($key, $checked)" />
                    @endforeach
                </div>
            </div>
        @endwire
    </div>
</x-custom-form>
