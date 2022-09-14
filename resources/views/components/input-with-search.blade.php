@props([
    'label' => '',
    'name' => '',
    'type' => '',
    'options' => '',
])
<div class="@if ($type === 'hidden') hidden @else mt-4 @endif">
    <label>
        <x-form-label :label="$label" />
        <div class="relative">
            <input {!! $attributes->merge([
                'class' => 'form-control ' . ($label ? 'mt-1' : ''),
            ]) !!} wire:model="{{ $name }}" name="{{ $name }}"
                type="{{ $type }}" />
            <div class="absolute inset-y-0 right-0 flex items-center">
                <select wire:model="{{ $name }}_select" name="{{ $name }}_select"
                    class="pl-2 bg-transparent border-transparent rounded-md p-auto pr-7 sm:text-sm">
                    @foreach ($options as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </label>
</div>
