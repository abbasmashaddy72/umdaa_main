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
                <div class="flex items-center mt-8">
                    <h2 class="mr-auto text-lg font-medium">
                        @if (Helper::getRouteAction() == 'create')
                            {{ __('Create') }} {{ $title }}
                        @elseif(Helper::getRouteAction() == 'edit')
                            {{ __('Edit') }} {{ $title }}
                        @elseif(Helper::getRouteAction() == 'show')
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

                {{ $slot }}
            </div>

        </div>
        <x:notify-messages />
        @livewireScripts
        @livewire('livewire-ui-modal')
        @notifyJs
        @stack('scripts')
        {{-- modalwidth comment for tailwind purge, used widths: sm:max-w-sm sm:max-w-md sm:max-w-lg sm:max-w-xl sm:max-w-2xl sm:max-w-3xl sm:max-w-4xl sm:max-w-5xl sm:max-w-6xl sm:max-w-7xl md:max-w-sm md:max-w-md md:max-w-lg md:max-w-xl md:max-w-2xl md:max-w-3xl md:max-w-4xl md:max-w-5xl md:max-w-6xl md:max-w-7xl lg:max-w-sm lg:max-w-md lg:max-w-lg lg:max-w-xl lg:max-w-2xl lg:max-w-3xl lg:max-w-4xl lg:max-w-5xl lg:max-w-6xl lg:max-w-7xl xl:max-w-sm xl:max-w-md xl:max-w-lg xl:max-w-xl xl:max-w-2xl xl:max-w-3xl xl:max-w-4xl xl:max-w-5xl xl:max-w-6xl xl:max-w-7xl 2xl:max-w-sm 2xl:max-w-md 2xl:max-w-lg 2xl:max-w-xl 2xl:max-w-2xl 2xl:max-w-3xl 2xl:max-w-4xl 2xl:max-w-5xl 2xl:max-w-6xl 2xl:max-w-7xl --}}
    </body>

</x-base-layout>
