<button wire:loading.attr="disabled" {{ $attributes->merge(['class' => 'w-24 btn btn-primary disabled:opacity-25']) }}>
    {{ $slot }}
</button>
