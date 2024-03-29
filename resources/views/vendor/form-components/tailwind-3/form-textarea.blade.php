<div>
    <label class="block">
        <x-form-label :label="$label" />

        <textarea @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
            name="{{ $name }}" {!! $attributes->merge(['class' => 'form-control ' . ($label ? 'mt-1' : '')]) !!}>
@unless($isWired())
{!! $value !!}
@endunless
</textarea>
    </label>

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
