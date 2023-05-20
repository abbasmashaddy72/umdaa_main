@if ($label)
    <div class="mt-4">
        <span {!! $attributes->merge(['class' => 'text-gray-700']) !!}>{{ $label }}</span>
    </div>
@endif
