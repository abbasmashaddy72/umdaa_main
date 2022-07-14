<x-base-layout>

    <body class="login">

        {{ $slot }}

        @include('layouts.partials.dark-mode-switcher')

        @stack('scripts')
    </body>

</x-base-layout>
