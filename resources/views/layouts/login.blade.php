<x-base-layout>

    <body class="login">

        {{ $slot }}

        @include('layouts.partials.dark-mode-switcher')

        @yield('script')
    </body>

</x-base-layout>
