<x-base-layout>

    <body class="py-5">

        {{ $slot }}

        @include('layouts.partials.dark-mode-switcher')

        @yield('script')
    </body>

</x-base-layout>
