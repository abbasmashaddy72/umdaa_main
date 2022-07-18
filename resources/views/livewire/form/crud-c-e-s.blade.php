<x-custom-form>
    @wire('debounce.200ms')
        <x-form-input name="title" label="Role Title" type="text" />

        <div class="mt-5">
            <x-form-label label="Permissions List" />
            @foreach ($permissions as $key => $value)
                <x-form-checkbox name="permissions.{{ $key }}" label="{{ $value }}" value="{{ $key }}"
                    :checked="in_array($key, $checked)" />
            @endforeach
        </div>
    @endwire
</x-custom-form>
