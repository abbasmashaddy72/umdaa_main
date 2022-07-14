<div class="col-span-12 intro-y lg:col-span-6">
    <!-- BEGIN: Form Layout -->
    <div class="p-5 intro-y box" wire:ignore>
        @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
            <form wire:submit.prevent="store">
            @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
                <form wire:submit.prevent="update">
                @else
                    <form id="form">
        @endif
        @csrf

        {{ $slot }}

        <div class="mt-5 text-right" wire:ignore>
            @if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'create')
                <x-submit-button>
                    {{ __('Save') }}
                </x-submit-button>
            @elseif(substr(strstr(Route::currentRouteAction(), '@'), 1) == 'edit')
                <x-submit-button>
                    {{ __('Update') }}
                </x-submit-button>
            @else
            @endif
        </div>
        </form>
    </div>
</div>
@if (substr(strstr(Route::currentRouteAction(), '@'), 1) == 'show')
    @push('scripts')
        <script>
            var form = document.getElementById("form");
            var allElements = form.elements;
            for (var i = 0, l = allElements.length; i < l; ++i) {
                // allElements[i].readOnly = true;
                allElements[i].disabled = true;
            }
        </script>
    @endpush
@endif
