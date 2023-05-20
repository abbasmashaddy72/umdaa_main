<a href="{{ route('dashboard') }}" {{ $attributes->merge(['class' => 'flex ']) }}>
    <img alt="{{ config('app.name', 'Laravel') }} Logo" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
    {{ $slot }}
</a>
