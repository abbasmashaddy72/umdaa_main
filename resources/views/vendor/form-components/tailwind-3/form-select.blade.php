<div class="mt-4">
    <label class="block">
        <x-form-label :label="$label" />

        <select @if ($isWired()) wire:model{!! $wireModifier() !!}="{{ $name }}" @endif
            name="{{ $name }}" @if ($multiple) multiple @endif
            @if ($placeholder) placeholder="{{ $placeholder }}" @endif {!! $attributes->merge([
                'class' => ($label ? 'mt-1' : '') . ' tom-select sm:mr-2',
            ]) !!}>

            @if ($placeholder)
                <option value="" selected hidden>
                    {{ $placeholder }}
                </option>
            @endif

            @forelse($options as $key => $option)
                <option value="{{ $key }}" @if ($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @empty
                {!! $slot !!}
            @endforelse
        </select>
    </label>

    @if ($hasErrorAndShow($name))
        <x-form-errors :name="$name" />
    @endif
</div>
