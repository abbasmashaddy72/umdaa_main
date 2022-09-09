@props([
    'label' => '',
    'name' => '',
    'type' => '',
])
<div class="input-group">
    <div class="w-2/3 mt-1 input-group-text">{{ $label }}</div>
    <input {!! $attributes->merge([
        'class' => 'form-control ' . ($label ? 'mt-1' : ''),
    ]) !!} wire:model="{{ $name }}" name="{{ $name }}"
        type="{{ $type }}" />
</div>
