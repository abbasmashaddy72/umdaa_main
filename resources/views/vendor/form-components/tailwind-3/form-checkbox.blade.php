<div class="flex flex-col">
    <label>
        <input {!! $attributes->merge(['class' => 'form-check-input ']) !!} type="checkbox" name="{{ $name }}" value="{{ $value }}"
            @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
            @if ($checked) checked="checked" @endif>
        <span class="form-check-label">{{ $label }}</span>
    </label>

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
