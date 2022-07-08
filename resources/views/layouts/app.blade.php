<x-base-layout>

    <body class="py-5">
        @if ($agent->isMobile())
            <!-- BEGIN: Mobile Menu -->
            @include('layouts.partials.mobile-menu')
            <!-- END: Mobile Menu -->
        @endif
        <div class="flex">
            @if (!$agent->isMobile() || $agent->isTablet())
                <!-- BEGIN: Side Menu -->
                @include('layouts.partials.side-menu')
                <!-- END: Side Menu -->
            @endif
            <div class="content">
                <!-- BEGIN: Top Bar -->
                @include('layouts.partials.top-bar')
                <!-- END: Top Bar -->
                <div class="flex items-center mt-8 intro-y">
                    <h2 class="mr-auto text-lg font-medium">
                        {{ $title }}
                    </h2>
                    @isset($add)
                        <div class="flex w-full mt-4 sm:w-auto sm:mt-0">
                            <a href="{{ route($add_route) }}" class="mr-2 shadow-md btn btn-primary">{{ $add }}</a>
                        </div>
                    @endisset
                </div>

                <div class="grid grid-cols-12 gap-5 mt-5">
                    {{ $slot }}
                </div>
            </div>

        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        @include('layouts.partials.dark-mode-switcher')
        <!-- END: Dark Mode Switcher-->
        @yield('script')
    </body>

</x-base-layout>
