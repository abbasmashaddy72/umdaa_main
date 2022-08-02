<div class="@if ($type === 'hidden') hidden @else mt-4 @endif">
    <label>
        <x-form-label :label="$label" />

        <input {!! $attributes->merge([
            'class' => 'form-control ' . ($label ? 'mt-1' : ''),
        ]) !!}
            @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}"
            @else
                value="{{ $value }}" @endif
            name="{{ $name }}" type="{{ $type }}" />
    </label>

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
