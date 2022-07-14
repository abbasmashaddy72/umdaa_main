<x-base-layout>
    @push('styles')
        @livewireStyles
    @endpush

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
                        @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
                            {{ __('Create') }} {{ $title }}
                        @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
                            {{ __('Edit') }} {{ $title }}
                        @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'show')
                            {{ __('Show') }} {{ $title }}
                        @else
                            {{ $title }}
                        @endif
                    </h2>
                    @if (Route::currentRouteName() != 'dashboard')
                        <div class="flex w-full mt-4 sm:w-auto sm:mt-0">
                            <a href="{{ $top_right_url ?? url()->previous() }}"
                                class="mr-2 shadow-md btn btn-primary">{{ $top_right_text ?? __('Back') }}</a>
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-12 gap-5 mt-5">
                    {{ $slot }}
                </div>
            </div>

        </div>
        <!-- BEGIN: Dark Mode Switcher-->
        @include('layouts.partials.dark-mode-switcher')
        @livewireScripts
        <!-- END: Dark Mode Switcher-->
        @stack('scripts')
    </body>

</x-base-layout>
